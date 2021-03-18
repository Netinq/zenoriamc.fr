<?php

use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PanelController::class, 'home'])->name('panel.home');
Route::resource('profil', ProfilController::class);

Route::resource('assistance', App\Http\Controllers\SupportController::class);
Route::get('/assistance/create/{tag}', [App\Http\Controllers\SupportController::class, 'createWithTag'])->name('support.create');
Route::post('/assistance/close/{id}', [App\Http\Controllers\SupportController::class, 'close'])->name('assistance.close');
Route::get('/assistance/view/all', [App\Http\Controllers\SupportController::class, 'all'])->name('assistance.all');
