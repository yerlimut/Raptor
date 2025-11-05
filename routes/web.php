<?php

use App\Http\Controllers\CategoriaRepuestoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MarcaMotoController;
use App\Http\Controllers\MecanicoController;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\PreordenController;
use App\Http\Controllers\RepuestoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// rutas clientes //
Route::get('/cliente/index',[ClienteController::class,'index'])->name('cliente.index');
Route::get('/cliente/create',[ClienteController::class,'create'])->name('cliente.create');
Route::post('/cliente/store',[ClienteController::class,'store'])->name('cliente.store');
Route::get('/cliente/edit/{id}',[ClienteController::class,'edit'])->name('cliente.edit');
Route::post('/cliente/update/{id}',[ClienteController::class,'update'])->name('cliente.update');
Route::post('/cliente/destroy/{id}',[ClienteController::class,'destroy'])->name('cliente.destroy');
// rutas marcas motos //

Route::get('/marcaMoto/index',[MarcaMotoController::class,'index'])->name('marcaMoto.index');
Route::get('/marcaMoto/create',[MarcaMotoController::class,'create'])->name('marcaMoto.create');
Route::post('/marcaMoto/store',[MarcaMotoController::class,'store'])->name('marcaMoto.store');
Route::get('/marcaMoto/edit/{id}',[MarcaMotoController::class,'edit'])->name('marcaMoto.edit');
Route::post('/marcaMoto/update/{id}',[MarcaMotoController::class,'update'])->name('marcaMoto.update');
Route::post('/marcaMoto/destroy/{id}',[MarcaMotoController::class,'destroy'])->name('marcaMoto.destroy');

// rutas mecanicos //
Route::get('/mecanico/index',[MecanicoController::class,'index'])->name('mecanico.index');
Route::get('/mecanico/create',[MecanicoController::class,'create'])->name('mecanico.create');
Route::post('/mecanico/store',[MecanicoController::class,'store'])->name('mecanico.store');
Route::get('/mecanico/edit/{id}',[MecanicoController::class,'edit'])->name('mecanico.edit');
Route::post('/mecanico/update/{id}',[MecanicoController::class,'update'])->name('mecanico.update');
Route::post('/mecanico/destroy/{id}',[MecanicoController::class,'destroy'])->name('mecanico.destroy');

// rutas categoria repuesto //
Route::get('/categoriaRepuesto/index',[CategoriaRepuestoController::class,'index'])->name('categoriaRepuesto.index');
Route::get('/categoriaRepuesto/create',[CategoriaRepuestoController::class,'create'])->name('categoriaRepuesto.create');
Route::post('/categoriaRepuesto/store',[CategoriaRepuestoController::class,'store'])->name('categoriaRepuesto.store');
Route::get('/categoriaRepuesto/edit/{id}',[CategoriaRepuestoController::class,'edit'])->name('categoriaRepuesto.edit');
Route::post('/categoriaRepuesto/update/{id}',[CategoriaRepuestoController::class,'update'])->name('categoriaRepuesto.update');
Route::post('/categoriaRepuesto/destroy/{id}',[CategoriaRepuestoController::class,'destroy'])->name('categoriaRepuesto.destroy');

// rutas Moto //

Route::get('/moto/index',[MotoController::class,'index'])->name('moto.index');
Route::get('/moto/create',[MotoController::class,'create'])->name('moto.create');
Route::post('/moto/store',[MotoController::class,'store'])->name('moto.store');
Route::get('/moto/edit/{id}',[MotoController::class,'edit'])->name('moto.edit');
Route::post('/moto/update/{id}',[MotoController::class,'update'])->name('moto.update');
Route::post('/moto/destroy/{id}',[MotoController::class,'destroy'])->name('moto.destroy');


// rutas repuesto //
Route::get('/repuesto/index',[RepuestoController::class,'index'])->name('repuesto.index');
Route::get('/repuesto/create',[RepuestoController::class,'create'])->name('repuesto.create');
Route::post('/repuesto/store',[RepuestoController::class,'store'])->name('repuesto.store');
Route::get('/repuesto/edit/{id}',[RepuestoController::class,'edit'])->name('repuesto.edit');
Route::post('/repuesto/update/{id}',[RepuestoController::class,'update'])->name('repuesto.update');
Route::post('/repuesto/destroy/{id}',[RepuestoController::class,'destroy'])->name('repuesto.destroy');

// rutas inventario //
Route::get('/inventario/index',[InventarioController::class,'index'])->name('inventario.index');
Route::get('/inventario/create',[InventarioController::class,'create'])->name('inventario.create');
Route::post('/inventario/store',[InventarioController::class,'store'])->name('inventario.store');
Route::get('/inventario/edit/{id}',[InventarioController::class,'edit'])->name('inventario.edit');
Route::post('/inventario/update/{id}',[InventarioController::class,'update'])->name('inventario.update');
Route::post('/inventario/destroy/{id}',[InventarioController::class,'destroy'])->name('inventario.destroy');
Route::get('/inventario/moto/{idMoto}', [App\Http\Controllers\InventarioController::class, 'porMoto'])->name('inventario.porMoto');


// rutas Diagnostico //
Route::get('/diagnostico/index',[DiagnosticoController::class,'index'])->name('diagnostico.index');
Route::get('/diagnostico/create',[DiagnosticoController::class,'create'])->name('diagnostico.create');
Route::post('/diagnostico/store',[DiagnosticoController::class,'store'])->name('diagnostico.store');
Route::get('/diagnostico/edit/{id}',[DiagnosticoController::class,'edit'])->name('diagnostico.edit');
Route::post('/diagnostico/update/{id}',[DiagnosticoController::class,'update'])->name('diagnostico.update');
Route::post('/diagnostico/destroy/{id}',[DiagnosticoController::class,'destroy'])->name('diagnostico.destroy');
Route::get('/diagnostico/moto/{idMoto}', [DiagnosticoController::class, 'porMoto'])->name('diagnostico.porMoto');


// rutas orden trabajo //
Route::get('/OrdenTrabajo/index',[OrdenTrabajoController::class,'index'])->name('OrdenTrabajo.index');
Route::get('/OrdenTrabajo/create',[OrdenTrabajoController::class,'create'])->name('OrdenTrabajo.create');
Route::post('/OrdenTrabajo/store',[OrdenTrabajoController::class,'store'])->name('OrdenTrabajo.store');
Route::get('/OrdenTrabajo/edit/{id}',[OrdenTrabajoController::class,'edit'])->name('OrdenTrabajo.edit');
Route::post('/OrdenTrabajo/update/{id}',[OrdenTrabajoController::class,'update'])->name('OrdenTrabajo.update');
Route::post('/OrdenTrabajo/destroy/{id}',[OrdenTrabajoController::class,'destroy'])->name('OrdenTrabajo.destroy');


// rutas preorden //
Route::get('/Preorden/index',[PreordenController::class,'index'])->name('Preorden.index');
Route::get('/Preorden/create',[PreordenController::class,'create'])->name('Preorden.create');
Route::post('/Preorden/store',[PreordenController::class,'store'])->name('Preorden.store');
Route::get('/Preorden/edit/{id}',[PreordenController::class,'edit'])->name('Preorden.edit');
Route::post('/Preorden/update/{id}',[PreordenController::class,'update'])->name('Preorden.update');
Route::post('/Preorden/destroy/{id}',[PreordenController::class,'destroy'])->name('Preorden.destroy');
