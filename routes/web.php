<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('index')->middleware('guest');
Route::post('/', [LoginController::class, 'login'])->name('login')->middleware('guest'); // Ruta POST para la ruta raíz
Route::view('home', 'home')->name('home')->middleware('auth');

// Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');;

// Route::get('/', [LoginController::class, 'index'])->name('index')->middleware('guest');
// Route::view('home','home')->name('home')->middleware('auth');

// Route::post('/login', [LoginController::class, 'login']);

// Route::post('/logout', [LoginController::class, 'logout']);
