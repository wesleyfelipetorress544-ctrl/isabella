<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows clickable product cards and links the order button to the cart', function () {
    Product::factory()->create([
        'name' => 'Smash da casa',
        'category' => 'lanches',
        'burger_type' => 'smash',
        'description' => 'Pão, carne e queijo.',
        'price' => '24.90',
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('class="catalog-product-trigger"', false)
        ->assertSee('data-product-name="Smash da casa"', false)
        ->assertSee('id="product-dialog"', false)
        ->assertSee('aspect-ratio:1', false)
        ->assertSee('id="product-add-notice"', false)
        ->assertSee('Adicionar ao pedido')
        ->assertSee('href="'.route('cart.index').'"', false)
        ->assertSeeText('Meu pedido · 0');
});

it('shows the shared product details modal and current item count on public catalog pages', function () {
    $product = Product::factory()->create([
        'name' => 'Suco natural',
        'category' => 'bebidas',
        'burger_type' => null,
    ]);

    $this->withSession(['cart' => [$product->id => 2]])
        ->get(route('bebidas'))
        ->assertOk()
        ->assertSee('data-product-name="Suco natural"', false)
        ->assertSee('id="product-dialog"', false)
        ->assertSeeText('Meu pedido · 2');

    $this->get(route('promocoes'))
        ->assertOk()
        ->assertSeeText('Meu pedido · 2');
});

it('adds products and shows database product data and totals on the pedido page', function () {
    $product = Product::factory()->create([
        'name' => 'Batata rústica',
        'category' => 'acompanhamentos',
        'burger_type' => null,
        'price' => '12.50',
    ]);

    $response = $this->post(route('cart.items.store'), [
        'product_id' => $product->id,
        'quantity' => 2,
    ]);
    $response->assertRedirect(route('cart.index'))
        ->assertSessionHas('cart', [$product->id => 2]);

    $response = $this->get(route('cart.index'));
    $response
        ->assertOk()
        ->assertViewIs('meu-pedido')
        ->assertSee('Batata rústica')
        ->assertSeeText('R$ 25,00')
        ->assertSee('storage/products/example.jpg', false)
        ->assertSee(route('cart.items.update', $product), false)
        ->assertSee(route('cart.items.destroy', $product), false)
        ->assertSee('name="quantity"', false)
        ->assertViewHas('cartItems', function (array $cartItems) use ($product): bool {
            return count($cartItems) === 1
                && $cartItems[0]['product']->is($product)
                && $cartItems[0]['quantity'] === 2;
        })
        ->assertViewHas('cartItemCount', 2)
        ->assertViewHas('subtotal', '25.00')
        ->assertViewHas('total', '25.00');

    $this->patch(route('cart.items.update', $product), ['quantity' => 3])
        ->assertRedirect(route('cart.index'))
        ->assertSessionHas('cart', [$product->id => 3]);

    $this->get(route('cart.index'))
        ->assertOk()
        ->assertSeeText('R$ 37,50')
        ->assertViewHas('cartItemCount', 3)
        ->assertViewHas('subtotal', '37.50');

    $this->delete(route('cart.items.destroy', $product))
        ->assertRedirect(route('cart.index'))
        ->assertSessionHas('cart', []);

    $this->get(route('cart.index'))
        ->assertOk()
        ->assertDontSee('Batata rústica')
        ->assertViewHas('cartItems', [])
        ->assertViewHas('cartItemCount', 0)
        ->assertViewHas('subtotal', '0.00');
});

it('adds products asynchronously and returns the updated cart count', function () {
    $product = Product::factory()->create();

    $this->postJson(route('cart.items.store'), [
        'product_id' => $product->id,
        'quantity' => 2,
    ])
        ->assertOk()
        ->assertExactJson([
            'message' => 'Adicionado ao seu pedido',
            'count' => 2,
        ])
        ->assertSessionHas('cart', [$product->id => 2]);
});

it('rejects asynchronous additions above the per-product limit', function () {
    $product = Product::factory()->create();

    $this->withSession(['cart' => [$product->id => 19]])
        ->postJson(route('cart.items.store'), [
            'product_id' => $product->id,
            'quantity' => 2,
        ])
        ->assertUnprocessable()
        ->assertJsonPath('message', 'Você pode adicionar até 20 unidades do mesmo produto.')
        ->assertSessionHas('cart', [$product->id => 19]);
});

it('stores the submitted order using current database prices and clears the cart', function () {
    $product = Product::factory()->create([
        'name' => 'Burger Smash',
        'category' => 'lanches',
        'burger_type' => 'smash',
        'price' => '19.90',
    ]);

    $response = $this->withSession(['cart' => [$product->id => 2]])
        ->post(route('cart.checkout'), [
            'customer_name' => 'Maria Silva',
            'customer_phone' => '11999998888',
            'delivery_address' => 'Rua das Flores, 123',
            'total' => '0.01',
            'unit_price' => '0.01',
        ]);
    $response->assertRedirect(route('cart.confirmation'))
        ->assertSessionMissing('cart');

    $order = Order::query()->with('items')->firstOrFail();

    expect($order->customer_name)->toBe('Maria Silva')
        ->and($order->customer_phone)->toBe('11999998888')
        ->and($order->delivery_address)->toBe('Rua das Flores, 123')
        ->and($order->total)->toBe('39.80')
        ->and($order->status)->toBe('novo')
        ->and($order->items)->toHaveCount(1)
        ->and($order->items->first()->unit_price)->toBe('19.90')
        ->and($order->items->first()->line_total)->toBe('39.80')
        ->and($order->items->first()->quantity)->toBe(2);

    $this->get(route('cart.confirmation'))
        ->assertOk()
        ->assertSee('Pedido enviado!')
        ->assertSee('Maria Silva')
        ->assertSee('#000001')
        ->assertSee('R$ 39,80');
});

it('requires a non-empty cart and valid customer details before checkout', function () {
    $this->post(route('cart.checkout'), [])
        ->assertRedirect(route('cart.index'))
        ->assertSessionHasErrors('cart');

    $product = Product::factory()->create();

    $this->withSession(['cart' => [$product->id => 1]])
        ->post(route('cart.checkout'), [])
        ->assertRedirect()
        ->assertSessionHasErrors([
            'customer_name',
            'customer_phone',
            'delivery_address',
        ]);

    $this->assertDatabaseCount('orders', 0);
});

it('protects the order management page and shows submitted orders to administrators', function () {
    $product = Product::factory()->create([
        'name' => 'X-Bacon',
        'price' => '28.00',
    ]);
    $order = Order::query()->create([
        'customer_name' => 'João Cliente',
        'customer_phone' => '11988887777',
        'delivery_address' => 'Avenida Central, 50',
        'total' => '28.00',
        'status' => 'novo',
    ]);
    $order->items()->create([
        'product_id' => $product->id,
        'product_name' => $product->name,
        'unit_price' => '28.00',
        'quantity' => 1,
        'line_total' => '28.00',
    ]);

    $this->get(route('pedidos'))
        ->assertRedirect(route('login'));

    $this->actingAs(User::factory()->create())
        ->get(route('pedidos'))
        ->assertForbidden();

    $this->actingAs(User::factory()->create(['is_admin' => true]))
        ->get(route('pedidos'))
        ->assertOk()
        ->assertSee('João Cliente')
        ->assertSee('X-Bacon')
        ->assertSee('Avenida Central, 50')
        ->assertSee('R$ 28,00')
        ->assertSee('1 de 1 pedidos');

    $this->actingAs(User::factory()->create(['is_admin' => true]))
        ->get(route('admin'))
        ->assertOk()
        ->assertSee('João Cliente')
        ->assertSee('Pedidos recebidos')
        ->assertSee('R$ 28,00');
});
