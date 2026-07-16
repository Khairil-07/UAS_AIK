<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GerakanController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/mode/{mode}', [GerakanController::class, 'index'])
    ->name('gerakan.index');

Route::get('/gerakan/{gerakan}', [GerakanController::class, 'show'])
    ->name('gerakan.show');