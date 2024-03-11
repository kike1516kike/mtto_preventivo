<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('/', [LoginController::class, 'login'])->name('login');
});



Route::middleware('auth')->group(function () {
    Route::view('home', 'home')->name('home');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Agrega aquí otras rutas que requieran autenticación
});

// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/', [LoginController::class, 'index'])->name('index')->middleware('guest');
// Route::view('home','home')->name('home')->middleware('auth');

// Route::post('/login', [LoginController::class, 'login']);

// Route::post('/logout', [LoginController::class, 'logout']);
