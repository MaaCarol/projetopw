<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProprietarioController; 
use App\Http\Controllers\VeiculoController; 
use App\Http\Controllers\AnuncioController;  

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
    return view('home');
});



Route::get('/proprietario/formulario', [ProprietarioController::class, 'formulario'])->name('proprietario-formulario');
Route::post('/proprietario/store', [ProprietarioController::class, 'store'])->name('proprietario-store');
Route::get('/proprietario/listar', [ProprietarioController::class, 'listar'])->name('proprietario-listar');
Route::get('/proprietario/editar/{id}', [ProprietarioController::class, 'editar'])->name('proprietario-editar');
Route::get('/proprietario/remover/{id}', [ProprietarioController::class, 'remover'])->name('proprietario-remover');


Route::get('/veiculo/formulario', [VeiculoController::class, 'formulario'])->name('veiculo-formulario');
Route::post('/veiculo/store', [VeiculoController::class, 'store'])->name('veiculo-store');
Route::get('/veiculo/list', [VeiculoController::class, 'list'])->name('veiculo-list'); 
Route::get('/veiculo/editar/{id}', [VeiculoController::class, 'editar'])->name('veiculo-editar');
Route::get('/veiculo/remove/{id}', [VeiculoController::class, 'remove'])->name('veiculo-remove'); 


Route::get('/anuncio/formulario', [AnuncioController::class, 'formulario'])->name('anuncio-formulario');
Route::post('/anuncio/store', [AnuncioController::class, 'store'])->name('anuncio-store');
Route::get('/anuncio/listar', [AnuncioController::class, 'listar'])->name('anuncio-listar');
Route::get('/anuncio/editar/{id}', [AnuncioController::class, 'editar'])->name('anuncio-editar');
Route::get('/anuncio/remover/{id}', [AnuncioController::class, 'remover'])->name('anuncio-remover');