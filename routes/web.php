<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanoController;
use App\Http\Controllers\Admin\PlanoDetalheController;

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
});

//Dashboard
Route::get('admin/', [PlanoController::class, 'index'])->name('admin.index');

//Prefixo Admin
Route::prefix('admin')->group(function()
    {
    //Planos Detalhes
    Route::get('planos/{url}/detalhes', [PlanoDetalheController::class, 'index'])->name('planosdetalhes.index');

    //Planos
    Route::get('planos', [PlanoController::class, 'index'])->name('planos.index');
    Route::get('planos/cadastrar', [PlanoController::class, 'create'])->name('planos.create');
    Route::post('planos', [PlanoController::class, 'store'])->name('planos.store');
    Route::any('planos/pesquisar', [PlanoController::class, 'search'])->name('planos.search');
    Route::get('planos/{url}', [PlanoController::class, 'show'])->name('planos.show');
    Route::delete('planos/{url}', [PlanoController::class, 'destroy'])->name('planos.destroy');
    Route::get('planos/{url}/editar', [PlanoController::class, 'edit'])->name('planos.edit');
    Route::put('planos/{url}', [PlanoController::class, 'update'])->name('planos.update');


    });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
