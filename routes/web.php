<?php

use Illuminate\Support\Facades\Route;

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
// routes/web.php

use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\AnuncioController;

// Rotas para Veículo
Route::get('/veiculo/formulario', [VeiculoController::class, 'formulario'])->name('veiculo-formulario');
Route::post('/veiculo/store', [VeiculoController::class, 'store'])->name('veiculo-store');
Route::get('/veiculo/listar', [VeiculoController::class, 'listar'])->name('veiculo-listar');
Route::get('/veiculo/editar/{id}', [VeiculoController::class, 'editar'])->name('veiculo-editar');
Route::delete('/veiculo/remover/{id}', [VeiculoController::class, 'remover'])->name('veiculo-remover'); // Usando DELETE para remover

// Rotas para Proprietário (faça o mesmo padrão)
Route::get('/proprietario/formulario', [ProprietarioController::class, 'formulario'])->name('proprietario-formulario');
Route::post('/proprietario/store', [ProprietarioController::class, 'store'])->name('proprietario-store');
Route::get('/proprietario/listar', [ProprietarioController::class, 'listar'])->name('proprietario-listar');
Route::get('/proprietario/editar/{id}', [ProprietarioController::class, 'editar'])->name('proprietario-editar');
Route::delete('/proprietario/remover/{id}', [ProprietarioController::class, 'remover'])->name('proprietario-remover');

// Rotas para Anúncio (faça o mesmo padrão)
Route::get('/anuncio/formulario', [AnuncioController::class, 'formulario'])->name('anuncio-formulario');
Route::post('/anuncio/store', [AnuncioController::class, 'store'])->name('anuncio-store');
Route::get('/anuncio/listar', [AnuncioController::class, 'listar'])->name('anuncio-listar');
Route::get('/anuncio/editar/{id}', [AnuncioController::class, 'editar'])->name('anuncio-editar');
Route::delete('/anuncio/remover/{id}', [AnuncioController::class, 'remover'])->name('anuncio-remover');