<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PanelController::class, 'home'])->name('home');
