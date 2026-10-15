<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = session('cart', []);

        if (! is_array($cart)) {
            $cart = [];
            session()->forget('cart');
        }
        $products = Product::query()
            ->whereKey(array_keys($cart))
            ->get()
            ->keyBy('id');
        $cartItems = [];
        $validCart = [];
        $cartItemCount = 0;
        $totalCents = 0;

        foreach ($cart as $productId => $quantity) {
            $product = $products->get((int) $productId);

            if (! $product) {
                continue;
            }

            $quantity = max(1, min(20, (int) $quantity));
            $validCart[$product->id] = $quantity;
            $lineTotalCents = $this->toCents((string) $product->price) * $quantity;
            $totalCents += $lineTotalCents;
            $cartItemCount += $quantity;
            $cartItems[] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }

        if ($validCart !== $cart) {
            session()->put('cart', $validCart);
            session()->flash('warning', 'Um ou mais produtos não estão mais disponíveis e foram removidos do pedido.');
        }

        return view('meu-pedido', [
            'cartItems' => $cartItems,
            'cartItemCount' => $cartItemCount,
            'subtotal' => $this->fromCents($totalCents),
            'total' => $this->fromCents($totalCents),
        ]);
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:20'],
        ]);

        $productId = (int) $validated['product_id'];
        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];
        $newQuantity = (int) ($cart[$productId] ?? 0) + (int) $validated['quantity'];

        if ($newQuantity > 20) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Você pode adicionar até 20 unidades do mesmo produto.',
                ], 422);
            }

            return redirect()->route('cart.index')
                ->withErrors(['quantity' => 'Você pode adicionar até 20 unidades do mesmo produto.']);
        }

        $cart[$productId] = $newQuantity;
        $request->session()->put('cart', $cart);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Adicionado ao seu pedido',
                'count' => array_sum($cart),
            ]);
        }

        return redirect()->route('cart.index')->with('status', 'Produto adicionado ao seu pedido.');
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:20'],
        ]);

        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];
        $cart[$product->id] = (int) $validated['quantity'];
        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', 'Quantidade atualizada.');
    }

    public function destroy(Request $request, Product $product): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', 'Produto removido do seu pedido.');
    }

    public function checkout(Request $request): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];

        if ($cart === []) {
            return redirect()->route('cart.index')
                ->withErrors(['cart' => 'Adicione pelo menos um produto antes de finalizar.']);
        }

        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'min:2', 'max:120'],
            'customer_phone' => ['required', 'string', 'regex:/^[0-9+\s().-]{8,32}$/'],
            'delivery_address' => ['required', 'string', 'min:5', 'max:1000'],
        ]);

        $order = DB::transaction(function () use ($cart, $validated): Order {
            $products = Product::query()
                ->whereKey(array_keys($cart))
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            if ($products->count() !== count($cart)) {
                throw ValidationException::withMessages([
                    'cart' => 'Um produto não está mais disponível. Confira seu pedido e tente novamente.',
                ]);
            }

            $orderLines = [];
            $totalCents = 0;

            foreach ($cart as $productId => $quantity) {
                $product = $products->get((int) $productId);
                $quantity = (int) $quantity;

                if (! $product || $quantity < 1 || $quantity > 20) {
                    throw ValidationException::withMessages([
                        'cart' => 'Confira as quantidades do pedido e tente novamente.',
                    ]);
                }

                $unitPriceCents = $this->toCents((string) $product->price);
                $lineTotalCents = $unitPriceCents * $quantity;
                $totalCents += $lineTotalCents;
                $orderLines[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'unitPriceCents' => $unitPriceCents,
                    'lineTotalCents' => $lineTotalCents,
                ];
            }

            $order = Order::query()->create([
                'customer_name' => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'delivery_address' => $validated['delivery_address'],
                'total' => $this->fromCents($totalCents),
                'status' => 'novo',
            ]);

            foreach ($orderLines as $line) {
                $order->items()->create([
                    'product_id' => $line['product']->id,
                    'product_name' => $line['product']->name,
                    'unit_price' => $this->fromCents($line['unitPriceCents']),
                    'quantity' => $line['quantity'],
                    'line_total' => $this->fromCents($line['lineTotalCents']),
                ]);
            }

            return $order;
        });

        $request->session()->forget('cart');
        $request->session()->put('completed_order_id', $order->id);

        return redirect()->route('cart.confirmation');
    }

    public function confirmation(): View|RedirectResponse
    {
        $orderId = session('completed_order_id');
        $order = is_numeric($orderId)
            ? Order::query()->with('items')->find((int) $orderId)
            : null;

        if (! $order) {
            return redirect()->route('cart.index');
        }

        return view('cart.confirmation', ['order' => $order]);
    }

    private function toCents(string $price): int
    {
        [$whole, $fraction] = array_pad(explode('.', $price, 2), 2, '0');

        return ((int) $whole * 100) + (int) str_pad($fraction, 2, '0');
    }

    private function fromCents(int $cents): string
    {
        return intdiv($cents, 100).'.'.str_pad((string) ($cents % 100), 2, '0', STR_PAD_LEFT);
    }
}
