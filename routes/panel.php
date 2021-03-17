<?php

use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PanelController::class, 'home'])->name('home');
Route::resource('profil', ProfilController::class);

Route::resource('assistance', App\Http\Controllers\SupportController::class);
Route::get('/assistance/create/{tag}', [App\Http\Controllers\SupportController::class, 'createWithTag'])->name('support.create');
