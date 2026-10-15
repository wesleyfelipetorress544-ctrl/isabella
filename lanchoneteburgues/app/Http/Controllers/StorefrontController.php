<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class StorefrontController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'burgers' => Product::query()->where('category', 'lanches')->latest()->get(),
        ]);
    }

    public function drinks(): View
    {
        return view('bebidas', [
            'products' => Product::query()->where('category', 'bebidas')->latest()->get(),
        ]);
    }

    public function sides(): View
    {
        return view('acompanhamentopage', [
            'products' => Product::query()->where('category', 'acompanhamentos')->latest()->get(),
        ]);
    }
}
