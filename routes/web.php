<?php

use App\Http\Controllers\Admin\ViewLoaderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web de tu aplicación. Estas rutas
| son cargadas por el RouteServiceProvider y todas ellas estarán
| asignadas al grupo de middleware "web".
|
*/

// Redirect root to admin dashboard
Route::redirect('/', '/admin/dashboard');

// Partial view loading for SPA
Route::get('/load-view', [ViewLoaderController::class, 'load'])->name('load-view');

// Admin routes group - SPA Entry Point
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard - Main SPA entry point
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Special routes for PDFs and external views (open in new tab)
    Route::get('detalle-cotizacion', function () {
        return view('admin.detalle-cotizacion');
    })->name('detalle-cotizacion');
    
    Route::get('detalle-orden', function () {
        return view('admin.detalle-orden');
    })->name('detalle-orden');
    
    Route::get('formato-factura', function () {
        return view('admin.formato-factura');
    })->name('formato-factura');
    
    Route::get('proyecto-pdf', function () {
        return view('admin.proyecto-pdf');
    })->name('proyecto-pdf');
    
    Route::get('formato-reporte', function () {
        return view('admin.formato-reporte');
    })->name('formato-reporte');
    
    // Back links from detail views
    Route::get('gestion-ordenes', function () {
        return redirect('/admin/dashboard');
    })->name('gestion-ordenes');
    
});

// Login route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
