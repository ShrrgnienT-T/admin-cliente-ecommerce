<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EletronicoController;
use App\Http\Controllers\RoupaController;
use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\LivroController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('eletronicos', EletronicoController::class);
    Route::resource('roupas', RoupaController::class);
    Route::resource('alimentos', AlimentoController::class);
    Route::resource('livros', LivroController::class);
});

// Rotas públicas de venda e carrinho
Route::get('eletronicos-venda', [EletronicoController::class, 'listar'])->name('eletronicos.venda');
Route::post('eletronicos/{eletronico}/adicionar-ao-carrinho', [EletronicoController::class, 'adicionarAoCarrinho'])->name('eletronicos.adicionarAoCarrinho');

Route::get('roupas-venda', [RoupaController::class, 'listar'])->name('roupas.venda');
Route::post('roupas/{roupa}/adicionar-ao-carrinho', [RoupaController::class, 'adicionarAoCarrinho'])->name('roupas.adicionarAoCarrinho');

Route::get('alimentos-venda', [AlimentoController::class, 'listar'])->name('alimentos.venda');
Route::post('alimentos/{alimento}/adicionar-ao-carrinho', [AlimentoController::class, 'adicionarAoCarrinho'])->name('alimentos.adicionarAoCarrinho');

Route::get('livros-venda', [LivroController::class, 'listar'])->name('livros.venda');
Route::post('livros/{livro}/adicionar-ao-carrinho', [LivroController::class, 'adicionarAoCarrinho'])->name('livros.adicionarAoCarrinho');

// Carrinho
Route::middleware('auth')->group(function () {
    Route::get('carrinho', [\App\Http\Controllers\CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::delete('carrinho/remover/{id}', [\App\Http\Controllers\CarrinhoController::class, 'remover'])->name('carrinho.remover');
});

require __DIR__ . '/auth.php';
