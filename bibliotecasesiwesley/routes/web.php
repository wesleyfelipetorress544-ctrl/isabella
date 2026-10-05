<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.attempt');
Route::get('/cadastro', [AuthController::class, 'showRegistration'])->name('register');
Route::post('/cadastro', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('register.store');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1')->name('admin.login.attempt');

Route::middleware('auth')->group(function () {
    Route::get('/biblioteca', [AuthController::class, 'library'])->name('biblioteca');

    Route::get('/livros', [BookController::class, 'index'])->name('books.index');
    Route::get('/livros/{book}', [BookController::class, 'show'])->name('books.show');
    Route::post('/livros/{book}/avaliacoes', [BookController::class, 'storeReview'])->middleware('throttle:10,1')->name('books.reviews.store');
    Route::post('/livros/{book}/emprestimos', [BookController::class, 'storeLoan'])->middleware('throttle:5,1')->name('books.loans.store');

    Route::get('/emprestimos', [LoanController::class, 'index'])->name('loans.index');
    Route::post('/emprestimos/{loan}/devolver', [LoanController::class, 'returnBook'])->name('loans.return');

    Route::middleware('admin')->group(function () {
        Route::get('/alunos', [StudentController::class, 'index'])->name('students.index');
        Route::get('/relatorios', [ReportController::class, 'index'])->name('reports.index');
    });

    Route::post('/sair', [AuthController::class, 'logout'])->name('logout');
});