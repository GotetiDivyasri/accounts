<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountsController;

Route::redirect('/', '/login', 301); 
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');
// Route::post('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('/accounts',[AccountsController::class, 'index'])->name('admin.accounts');

