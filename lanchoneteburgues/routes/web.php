<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorefrontController;
use App\Http\Middleware\EnsureStoreIsOpen;
use Illuminate\Support\Facades\Route;

Route::middleware(EnsureStoreIsOpen::class)->group(function (): void {
    Route::get('/', [StorefrontController::class, 'index'])->name('home');
    Route::get('/bebidas', [StorefrontController::class, 'drinks'])->name('bebidas');
    Route::get('/acompanhamentopage', [StorefrontController::class, 'sides'])->name('acompanhamentopage');
    Route::get('/meu-pedido', [CartController::class, 'index'])->name('cart.index');
    Route::post('/meu-pedido/itens', [CartController::class, 'store'])->name('cart.items.store');
    Route::patch('/meu-pedido/itens/{product}', [CartController::class, 'update'])->name('cart.items.update');
    Route::delete('/meu-pedido/itens/{product}', [CartController::class, 'destroy'])->name('cart.items.destroy');
    Route::post('/meu-pedido/finalizar', [CartController::class, 'checkout'])
        ->middleware('throttle:10,1')
        ->name('cart.checkout');
    Route::get('/pedido/confirmado', [CartController::class, 'confirmation'])->name('cart.confirmation');
    Route::view('/motoboys', 'motoboys')->name('motoboys');
    Route::view('/produtos', 'produtos')->name('produtos');
    Route::view('/promocoes', 'promocoes')->name('promocoes');
});

Route::get('/admin/login', [AdminAuthController::class, 'create'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('admin.login.store');
Route::post('/admin/logout', [AdminAuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/status-loja', [AdminController::class, 'updateStoreStatus'])
        ->name('admin.store-status.update');
    Route::get('/pedidos', [AdminOrderController::class, 'index'])->name('pedidos');
    Route::post('/admin/produtos', [ProductController::class, 'store'])->name('admin.products.store');
    Route::delete('/admin/produtos/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});
