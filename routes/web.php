<?php

use App\Http\Controllers\AgragarIncidencia;
use App\Http\Controllers\asignacion;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\FinalizarController;
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\mostrarTareas;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\tareascontroller;
use App\Http\Controllers\verTarea;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Pest\Plugins\Only;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('/Registrar-incidencia','agregar-incidencia')->name('incidencia');
Route::view('/asignar','asignacion')->name('asignacion');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('Incidencia', IncidenciasController::class)
    ->only(['index', 'store', 'show','update'])
    ->middleware(['auth', 'verified']);

Route::resource('agregar',AgragarIncidencia::class)
    ->Only(['index','store']);

Route::resource('asignar',asignacion::class)
    ->only(['show'])
    ->middleware(['auth','verified']);

Route::resource('Asignacion', AsignacionController::class)
    ->only(['store']);

Route::resource('Tareas',mostrarTareas::class)
    ->only(['show']);

Route::resource('Tarea',verTarea::class)
    ->only(['show']);

Route::resource('Solucion',tareascontroller::class)
    ->only(['show']);

Route::resource('Soluciones',TareaController::class)
    ->only(['store']);

Route::resource('Finalizar',FinalizarController::class)
->only(['store']);

Route::resource('Pruebas',PruebasController::class)
    ->only(['show']);
    
require __DIR__.'/auth.php';
