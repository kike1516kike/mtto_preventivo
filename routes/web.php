<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

 Route::view('/', 'index')->name('index');
 
 //Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');  
 //});