<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect root to admin dashboard
Route::redirect('/', '/admin/dashboard');

// Admin routes group
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('usuarios', function () {
        return view('admin.usuarios');
    })->name('usuarios');

    Route::get('gestion-usuarios', function () {
        return view('admin.gestion-usuarios');
    })->name('gestion-usuarios');

    Route::get('roles-permisos', function () {
        return view('admin.roles-permisos');
    })->name('roles-permisos');
});

// Login route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
