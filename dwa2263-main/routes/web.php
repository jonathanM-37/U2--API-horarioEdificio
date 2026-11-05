<?php

use App\Models\Aula;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\MesaController;
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
    return view('otra');
});

//Route::get('/decir/',[Aula::class,'saludar']);

Route::get('preagregar',[AulaController::class, 'create'])->name('aulas.agregar');
Route::get('seleccionar/{x}' ,[AulaController::class, 'edit'])->name('aulas.actualizar');

Route::post('agregar/',[AulaController::class, 'store']);
Route::get('listar',[AulaController::class, 'index']);
Route::get('unoporuno/{x}',[AulaController::class, 'show']);
route::put('actualiza/{x}',[AulaController::class, 'update']);
route::delete('borrar/{x}',[AulaController::class, 'destroy'])->name('aulas.borrar');

Route::resource('mesas',MesaController::class);
