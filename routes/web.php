<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\VofficeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PerifericoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\RevisionController;
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
    Route::get('/voffices', [VofficeController::class, 'index'])->name('voffices.index');
    Route::get('/voffices/create', [VofficeController::class, 'create'])->name('voffices.create');
    Route::post('/voffices', [VofficeController::class, 'store'])->name('voffices.store');
    Route::get('/voffices/{voffice}/view', [VofficeController::class, 'show'])->name('voffices.show');
    Route::get('/voffices/{voffice}/edit', [VofficeController::class, 'edit'])->name('voffices.edit');
    Route::put('/voffices/{voffice}', [VofficeController::class, 'update'])->name('voffices.update');
    Route::delete('/voffices/{voffice}', [VofficeController::class, 'destroy'])->name('voffices.destroy');

    /*RUTAS DE Perfil*/
    Route::get('/perfiles', [PerfilController::class, 'index'])->name('perfiles.index');
    Route::get('/perfiles/create', [PerfilController::class, 'create'])->name('perfiles.create');
    Route::post('/perfiles', [PerfilController::class, 'store'])->name('perfiles.store');
    Route::get('/perfiles/{perfil}/view', [PerfilController::class, 'show'])->name('perfiles.show');
    Route::get('/perfiles/{perfil}/edit', [PerfilController::class, 'edit'])->name('perfiles.edit');
    Route::put('/perfiles/{perfil}', [PerfilController::class, 'update'])->name('perfiles.update');
    Route::delete('/perfiles/{perfil}', [PerfilController::class, 'destroy'])->name('perfiles.destroy');

    /*RUTAS DE Equipo*/
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
    Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/equipos/{equipo}/view', [EquipoController::class, 'show'])->name('equipos.show');
    Route::get('/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');
    Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
    Route::delete('/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');

    /*RUTAS DE Periferico*/
    Route::get('/perifericos', [PerifericoController::class, 'index'])->name('perifericos.index');
    Route::get('/perifericos/create', [PerifericoController::class, 'create'])->name('perifericos.create');
    Route::post('/perifericos', [PerifericoController::class, 'store'])->name('perifericos.store');
    Route::get('/perifericos/{periferico}/view', [PerifericoController::class, 'show'])->name('perifericos.show');
    Route::get('/perifericos/{periferico}/edit', [PerifericoController::class, 'edit'])->name('perifericos.edit');
    Route::put('/perifericos/{periferico}', [PerifericoController::class, 'update'])->name('perifericos.update');
    Route::delete('/perifericos/{periferico}', [PerifericoController::class, 'destroy'])->name('perifericos.destroy');

    /*RUTAS DE Eventos*/
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/{evento}/view', [EventoController::class, 'show'])->name('eventos.show');
    Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/{evento}', [EventoController::class, 'update'])->name('eventos.update');
    Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');

    /*RUTAS DE Mantenimiento*/
    Route::get('/mantenimientos', [MantenimientoController::class, 'index'])->name('mantenimientos.index');
    // Route::get('/mantenimientos/create', [MantenimientoController::class, 'create'])->name('mantenimientos.create');
    // Route::post('/mantenimientos', [MantenimientoController::class, 'store'])->name('mantenimientos.store');
    Route::get('/mantenimientos/{mantenimiento}/view', [MantenimientoController::class, 'show'])->name('mantenimientos.show');
    Route::get('/mantenimientos/{mantenimiento}/edit', [MantenimientoController::class, 'edit'])->name('mantenimientos.edit');
    // Route::get('/mantenimientos/revision', [MantenimientoController::class, 'revision'])->name('mantenimientos.revision');
    Route::get('/mantenimientos/{mantenimiento}/criterio', [MantenimientoController::class, 'criterio'])->name('mantenimientos.criterio');
    Route::put('/mantenimientos/{mantenimiento}', [MantenimientoController::class, 'update'])->name('mantenimientos.update');
    Route::put('/mantenimientos/{mantenimiento}/criterios', [MantenimientoController::class, 'update_criterios'])->name('mantenimientos.update_criterios');
    Route::put('/mantenimientos/{mantenimiento}/firma_usuario', [MantenimientoController::class, 'firma_usuario'])->name('mantenimientos.firma_usuario');
    //  Route::put('/mantenimientos/{mantenimiento}/firma_jefe', [MantenimientoController::class, 'firma_jefe'])->name('mantenimientos.firma_jefe');
    Route::put('/mantenimientos/{mantenimiento}/firma_auxiliar', [MantenimientoController::class, 'firma_auxiliar'])->name('mantenimientos.firma_auxiliar');
    Route::delete('/mantenimientos/{mantenimiento}', [MantenimientoController::class, 'destroy'])->name('mantenimientos.destroy');


    /*RUTAS DE Revision*/
    Route::get('/revisiones', [RevisionController::class, 'index'])->name('revisiones.index');
    Route::get('/revisiones/create', [RevisionController::class, 'create'])->name('revisiones.create');
    Route::post('/revisiones', [RevisionController::class, 'store'])->name('revisiones.store');
    Route::get('/revisiones/{revision}/view', [RevisionController::class, 'show'])->name('revisiones.show');
    Route::get('/revisiones/{revision}/edit', [RevisionController::class, 'edit'])->name('revisiones.edit');
    Route::put('/revisiones/{revision}', [RevisionController::class, 'update'])->name('revisiones.update');
    Route::put('/revisiones/{revision}/firma_jefe', [RevisionController::class, 'firma_jefe'])->name('revisiones.firma_jefe');
    Route::delete('/revisiones/{revision}', [RevisionController::class, 'destroy'])->name('revisiones.destroy');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
