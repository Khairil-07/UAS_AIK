<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\AdminController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/gerakan/{urutan}', [DetailController::class, 'show'])->name('detail');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/admin/gerakan/update', [AdminController::class, 'updateGerakan'])->name('admin.gerakan.update');
Route::post('/admin/meta/update', [AdminController::class, 'updateMeta'])->name('admin.meta.update');
Route::post('/admin/reset', [AdminController::class, 'resetDatabase'])->name('admin.reset');
