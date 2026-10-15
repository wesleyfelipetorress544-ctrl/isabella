<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\StoreSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin', [
            'products' => Product::query()->latest()->limit(50)->get(),
            'productCount' => Product::query()->count(),
            'orders' => Order::query()->with('items')->latest()->limit(5)->get(),
            'orderCount' => Order::query()->count(),
            'todayOrderCount' => Order::query()->whereDate('created_at', today())->count(),
            'todaySales' => Order::query()->whereDate('created_at', today())->sum('total'),
            'averageTicket' => Order::query()->whereDate('created_at', today())->avg('total') ?? 0,
            'storeIsOpen' => StoreSetting::query()->find(1)?->is_open ?? true,
        ]);
    }

    public function updateStoreStatus(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'is_open' => ['required', 'boolean'],
        ]);

        $isOpen = (bool) $validated['is_open'];
        $storeSetting = StoreSetting::query()->findOrNew(1);
        $storeSetting->is_open = $isOpen;
        $storeSetting->save();

        return to_route('admin')->with(
            'store_status',
            $isOpen ? 'Loja aberta com sucesso.' : 'Loja fechada com sucesso.',
        );
    }
}
