<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route:: get('', [HomeController::class, 'index']);