<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\VofficeController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');

    Route::post('/', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::view('home', 'home')->name('home');

    /*RUTAS DE USUARIO*/
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{usuario}/view', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    /*RUTAS DE MARCA*/
    Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
    Route::get('/marcas/create', [MarcaController::class, 'create'])->name('marcas.create');
    Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
    Route::get('/marcas/{marca}/view', [MarcaController::class, 'show'])->name('marcas.show');
    Route::get('/marcas/{marca}/edit', [MarcaController::class, 'edit'])->name('marcas.edit');
    Route::put('/marcas/{marca}', [MarcaController::class, 'update'])->name('marcas.update');
    Route::delete('/marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');

    /*RUTAS DE UBICACION*/
    Route::get('/ubicaciones', [UbicacionController::class, 'index'])->name('ubicaciones.index');
    Route::get('/ubicaciones/create', [UbicacionController::class, 'create'])->name('ubicaciones.create');
    Route::post('/ubicaciones', [UbicacionController::class, 'store'])->name('ubicaciones.store');
    Route::get('/ubicaciones/{ubicacion}/view', [UbicacionController::class, 'show'])->name('ubicaciones.show');
    Route::get('/ubicaciones/{ubicacion}/edit', [UbicacionController::class, 'edit'])->name('ubicaciones.edit');
    Route::put('/ubicaciones/{ubicacion}', [UbicacionController::class, 'update'])->name('ubicaciones.update');
    Route::delete('/ubicaciones/{ubicacion}', [UbicacionController::class, 'destroy'])->name('ubicaciones.destroy');

    /*RUTAS DE Voffice*/
    Route::get('/Voffices', [VofficeController::class, 'index'])->name('voffices.index');
    Route::get('/Voffices/create', [VofficeController::class, 'create'])->name('voffices.create');
    Route::post('/Voffices', [VofficeController::class, 'store'])->name('voffices.store');
    Route::get('/Voffices/{voffice}/view', [VofficeController::class, 'show'])->name('voffices.show');
    Route::get('/Voffices/{voffice}/edit', [VofficeController::class, 'edit'])->name('voffices.edit');
    Route::put('/Voffices/{voffice}', [VofficeController::class, 'update'])->name('voffices.update');
    Route::delete('/Voffices/{voffice}', [VofficeController::class, 'destroy'])->name('voffices.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
