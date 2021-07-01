<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('/home');
Route::post('/convert', [\App\Http\Controllers\HomeController::class, 'convert'])->name('convert')
    ->middleware('throttle:clickConvertLimited');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login']);

// Facebook login
Route::get('/login/facebook', [App\Http\Controllers\AuthController::class, 'redirectToFacebook']);
Route::get('/login/facebook/callback', [App\Http\Controllers\AuthController::class, 'handleFacebookCallback']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/user/{id}', [\App\Http\Controllers\HomeController::class, 'historyConvert'])->name('history');
Route::get('/delete/{id}', [\App\Http\Controllers\HomeController::class, 'deleteHistory']);









