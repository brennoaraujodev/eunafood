<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanoController;

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

//Planos
Route::get('admin/planos', [PlanoController::class, 'index'])->name('planos.index');
Route::get('admin/planos/cadastrar', [PlanoController::class, 'create'])->name('planos.create');
Route::post('admin/planos', [PlanoController::class, 'store'])->name('planos.store');
Route::get('admin/planos/{url}', [PlanoController::class, 'show'])->name('planos.show');
Route::delete('admin/planos/{url}', [PlanoController::class, 'destroy'])->name('planos.destroy');
Route::any('admin/plano/pesquisar', [PlanoController::class, 'search'])->name('planos.search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
