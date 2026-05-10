<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\DashboardController;

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [AuthController::class, 'showLoginForm'])->name('loginnew');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::prefix('/clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes.visualizarClientes');
    Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/{usuario}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/{usuario}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/{usuario}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
});
Route::prefix('/livros')->group(function () {
    Route::get('/', [LivroController::class, 'index'])->name('livros.visualizarLivros');
    Route::get('/create', [LivroController::class, 'create'])->name('livros.create');
    Route::post('/', [LivroController::class, 'store'])->name('livros.store');
    Route::get('/{livro}/edit', [LivroController::class, 'edit'])->name('livros.edit');
    Route::put('/{livro}', [LivroController::class, 'update'])->name('livros.update');
    Route::delete('/{livro}', [LivroController::class, 'destroy'])->name('livros.destroy');
});
