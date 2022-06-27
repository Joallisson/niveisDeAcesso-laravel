<?php

use App\Http\Controllers\Web\UserControlller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('auth', [UserControlller::class, 'auth'])->name('auth.user');

Route::middleware(['admin'])->group(function(){
    Route::get('admin', function(){
        dd('Você é um Admin');
    });
});

Route::middleware(['client'])->group(function(){
    Route::get('client', function(){
        dd('Você é um Cliente');
    });
});
