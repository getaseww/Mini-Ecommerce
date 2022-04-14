<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// admin routes
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index']);

// client routes
Route::get('/crm/dashboard', [App\Http\Controllers\ClientController::class, 'index']);

