<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });

 Route::post('login',function(){
    $credenciales = request()->only('user', 'password');

    if (Auth::attempt($credenciales)) {
        return redirect()->route('home');
    }
return 'you are logged in';

 });

 Route::view('/home', 'home')->name('home');



