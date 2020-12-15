<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/produtos', [ProdutosController::class, 'index'])->name('products.index');
Route::get('/produtos/tipo/{id}', [ProdutosController::class, 'produtosPorTipo'])->name('products.by.tipo');
Route::get('/produtos/create', [ProdutosController::class, 'create'])->name('products.create');
Route::POST('/produtos', [ProdutosController::class, 'store'])->name('products.store');
Route::get('/produtos/{id}', [ProdutosController::class, 'show'])->name('products.show');
Route::delete('/produtos/{id}', [ProdutosController::class, 'destroy'])->name('products.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
