<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/upload', [UploadController::class, 'showUploadForm'])->middleware('auth')->name('upload');
Route::post('/upload', [UploadController::class, 'upload'])->middleware('auth');
