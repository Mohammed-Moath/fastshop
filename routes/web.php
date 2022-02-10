<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

Auth::routes();

Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(["prefix" => "products"], function () {
    Route::get('{id}/view', [App\Http\Controllers\WelcomeController::class, 'viewProduct']);
});

Route::group(["prefix" => "store", "middleware" => "auth.check"], function () {
    
    Route::get('/',[App\Http\Controllers\WelcomeController::class, 'store'])->name('store');
    Route::POST('/', [App\Http\Controllers\WelcomeController::class, 'store'])->name('store');

});

