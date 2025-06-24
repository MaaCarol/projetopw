<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\AnuncioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas para Veículos
Route::get('/veiculo/formulario', [VeiculoController::class, 'formulario'])->name('veiculo-formulario');
Route::post('/veiculo/store', [VeiculoController::class, 'store'])->name('veiculo-store');
Route::get('/veiculo/listar', [VeiculoController::class, 'listar'])->name('veiculo-listar');
Route::get('/veiculo/remover/{id}', [VeiculoController::class, 'remover'])->name('veiculo-remover'); // Com ID para remover
Route::get('/veiculo/editar/{id}', [VeiculoController::class, 'editar'])->name('veiculo-editar');   // Com ID para editar

// Rotas para Proprietários
Route::get('/proprietario/formulario', [ProprietarioController::class, 'formulario'])->name('proprietario-formulario');
Route::post('/proprietario/store', [ProprietarioController::class, 'store'])->name('proprietario-store');
Route::get('/proprietario/listar', [ProprietarioController::class, 'listar'])->name('proprietario-listar');
Route::get('/proprietario/remover/{id}', [ProprietarioController::class, 'remover'])->name('proprietario-remover');
Route::get('/proprietario/editar/{id}', [ProprietarioController::class, 'editar'])->name('proprietario-editar');

// Rotas para Anúncios
Route::get('/anuncio/formulario', [AnuncioController::class, 'formulario'])->name('anuncio-formulario');
Route::post('/anuncio/store', [AnuncioController::class, 'store'])->name('anuncio-store');
Route::get('/anuncio/listar', [AnuncioController::class, 'listar'])->name('anuncio-listar');
Route::get('/anuncio/remover/{id}', [AnuncioController::class, 'remover'])->name('anuncio-remover');
Route::get('/anuncio/editar/{id}', [AnuncioController::class, 'editar'])->name('anuncio-editar');