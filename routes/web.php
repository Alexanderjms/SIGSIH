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
Route::prefix('admin')->name('admin.')->middleware(['spa.init'])->group(function () {
    
    // Main dashboard - entry point
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Seguridad
    Route::get('gestion-usuarios', function () {
        return view('admin.dashboard');
    })->name('gestion-usuarios');
    
    Route::get('parametros', function () {
        return view('admin.dashboard');
    })->name('parametros');
    
    Route::get('configuracion-acceso', function () {
        return view('admin.dashboard');
    })->name('configuracion-acceso');
    
    // Clientes
    Route::get('gestion-empresas', function () {
        return view('admin.dashboard');
    })->name('gestion-empresas');
    
    Route::get('cotizaciones', function () {
        return view('admin.dashboard');
    })->name('cotizaciones');
    
    // Solicitudes
    Route::get('solicitudes', function () {
        return view('admin.dashboard');
    })->name('solicitudes');
    
    // Órdenes de Servicio
    Route::get('gestion-ordenes', function () {
        return view('admin.dashboard');
    })->name('gestion-ordenes');
    
    // Proyectos
    Route::get('vista-proyectos', function () {
        return view('admin.dashboard');
    })->name('vista-proyectos');
    
    Route::get('proyectos', function () {
        return view('admin.dashboard');
    })->name('proyectos');
    
    // Tickets
    Route::get('tickets', function () {
        return view('admin.dashboard');
    })->name('tickets');
    
    // Calendario
    Route::get('agencias', function () {
        return view('admin.dashboard');
    })->name('agencias');
    
    Route::get('calendario', function () {
        return view('admin.dashboard');
    })->name('calendario');
    
    // Facturación
    Route::get('facturas', function () {
        return view('admin.dashboard');
    })->name('facturas');
    
    Route::get('cai', function () {
        return view('admin.dashboard');
    })->name('cai');
    
    // Reportes
    Route::get('reportes', function () {
        return view('admin.dashboard');
    })->name('reportes');
    
    // Inventario
    Route::get('productos', function () {
        return view('admin.dashboard');
    })->name('productos');
    
    Route::get('kardex', function () {
        return view('admin.dashboard');
    })->name('kardex');
    
    // Administración
    Route::get('gestion-personas', function () {
        return view('admin.dashboard');
    })->name('gestion-personas');
    
    Route::get('perfil', function () {
        return view('admin.dashboard');
    })->name('perfil');
    
    Route::get('cambio-contrasena', function () {
        return view('admin.dashboard');
    })->name('cambio-contrasena');
    
    Route::get('bitacora', function () {
        return view('admin.dashboard');
    })->name('bitacora');
    
    Route::get('gestion-db', function () {
        return view('admin.dashboard');
    })->name('gestion-db');
    
    // Mantenimiento
    Route::get('mantenimiento-general', function () {
        return view('admin.dashboard');
    })->name('mantenimiento-general');
    
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
    
});

// Login route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
