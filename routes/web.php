<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;

/*Route::get('/', function () {
    return view('welcome')->name('home');
});*/

// Página de inicio
Route::get('/', function () {
    return view('inicio');
});

// Catálogo de productos
Route::get('/productos', function () {
    return view('productos.index');
});

// Ficha de producto (ejemplo con ID)
Route::get('/producto/{id}', function ($id) {
    return view('productos.show', compact('id'));
});

// PANEL ADMINISTRADOR
Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    // Productos
    Route::get('/productos', function () {
        return view('admin.productos.index');
    });

    Route::get('/productos/crear', function () {
        return view('admin.productos.create');
    });

    Route::get('/productos/{id}/editar', function ($id) {
        return view('admin.productos.edit', compact('id'));
    });

});


// CARRITO
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
   

