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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// LEGAL
Route::get('/mentions-legales', [App\Http\Controllers\HomeController::class, 'mentionslegales'])->name('mentions-legales');
Route::get('/conditions-generales', [App\Http\Controllers\HomeController::class, 'conditionsgenerales'])->name('conditions-generales');
