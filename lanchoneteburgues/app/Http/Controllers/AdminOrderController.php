<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;

class AdminOrderController extends Controller
{
    public function index(): View
    {
        return view('pedidos', [
            'orders' => Order::query()->with('items')->latest()->limit(50)->get(),
            'totalCount' => Order::query()->count(),
            'newCount' => Order::query()->where('status', 'novo')->count(),
            'prepCount' => Order::query()->where('status', 'preparo')->count(),
            'salesTotal' => Order::query()->sum('total'),
        ]);
    }
}
