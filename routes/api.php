<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\ColaboradorController;

Route::get('grupos_economicos', [GrupoEconomicoController::class, 'index']);
Route::get('grupos_economicos/create', [GrupoEconomicoController::class, 'create'])->name('grupos_economicos.create');
Route::post('grupos_economicos', [GrupoEconomicoController::class, 'store'])->name('grupos_economicos.store');
Route::get('grupos_economicos/{id}/edit', [GrupoEconomicoController::class, 'edit'])->name('grupos_economicos.edit');
Route::put('grupos_economicos/{id}', [GrupoEconomicoController::class, 'update'])->name('grupos_economicos.update');
Route::delete('grupos_economicos/{id}', [GrupoEconomicoController::class, 'destroy']);

// Rotas de Bandeira
Route::get('bandeiras', [BandeiraController::class, 'index']);
Route::post('bandeiras', [BandeiraController::class, 'store'])->name('bandeiras.store');;
Route::get('bandeiras/create', [BandeiraController::class, 'create'])->name('bandeiras.create');
Route::put('bandeiras/{id}', [BandeiraController::class, 'update'])->name('bandeiras.update');
Route::delete('bandeiras/{id}', [BandeiraController::class, 'destroy']);
Route::get('bandeiras/{id}/edit', [BandeiraController::class, 'edit'])->name('bandeiras.edit');


// Rotas de Unidade
Route::get('unidades', [UnidadeController::class, 'index']);
Route::post('unidades', [UnidadeController::class, 'store'])->name('unidades.store');
Route::get('unidades/create', [UnidadeController::class, 'create'])->name('unidades.create');
Route::put('unidades/{id}', [UnidadeController::class, 'update'])->name('unidades.update');
Route::delete('unidades/{id}', [UnidadeController::class, 'destroy']);
Route::get('unidades/{id}/edit', [UnidadeController::class, 'edit'])->name('unidades.edit');


// Rotas de Colaborador
Route::get('colaboradores', [ColaboradorController::class, 'index']);
Route::post('colaboradores', [ColaboradorController::class, 'store'])->name('colaboradores.store');
Route::get('colaboradores/create', [ColaboradorController::class, 'create'])->name('colaboradores.create');
Route::put('colaboradores/{id}', [ColaboradorController::class, 'update'])->name('colaboradores.update');
Route::delete('colaboradores/{id}', [ColaboradorController::class, 'destroy']);
Route::get('colaboradores/{id}/edit', [ColaboradorController::class, 'edit'])->name('colaboradores.edit');
Route::get('colaboradores/exportar-html', [ColaboradorController::class, 'exportarHTML'])->name('colaboradores.exportarHTML');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
