<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/nos-jeux', [App\Http\Controllers\HomeController::class, 'games'])->name('games');

Route::get('/mentions-legales', [App\Http\Controllers\HomeController::class, 'mentionslegales'])->name('mentions-legales');
Route::get('/conditions-generales', [App\Http\Controllers\HomeController::class, 'conditionsgenerales'])->name('conditions-generales');
