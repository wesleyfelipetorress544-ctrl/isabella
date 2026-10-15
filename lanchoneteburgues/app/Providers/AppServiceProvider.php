<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['welcome', 'bebidas', 'acompanhamentopage', 'promocoes', 'cart.confirmation'], function (\Illuminate\View\View $view): void {
            $cart = session('cart', []);

            $view->with('cartItemCount', is_array($cart) ? array_sum($cart) : 0);
        });
    }
}
