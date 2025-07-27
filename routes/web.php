<?php

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

// Admin routes group
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Seguridad
    Route::get('usuarios', function () {
        return view('admin.usuarios');
    })->name('usuarios');

    Route::get('gestion-usuarios', function () {
        return view('admin.gestion-usuarios');
    })->name('gestion-usuarios');

    Route::get('roles-permisos', function () {
        return view('admin.roles-permisos');
    })->name('roles-permisos');

    Route::get('configuracion-acceso', function () {
        return view('admin.configuracion-acceso');
    })->name('configuracion-acceso');

    // Clientes
    Route::get('gestion-empresas', function () {
        return view('admin.gestion-empresas');
    })->name('gestion-empresas');

    Route::get('cotizaciones', function () {
        return view('admin.cotizaciones');
    })->name('cotizaciones');

    // Solicitudes
    Route::get('solicitudes', function () {
        return view('admin.solicitudes');
    })->name('solicitudes.index');

    Route::get('solicitudes/empresas', function () {
        return view('admin.solicitudes-empresas');
    })->name('solicitudes.empresas');

    // Ordenes de Servicio
    Route::get('ordenes-servicio', function () {
        return view('admin.ordenes-servicio');
    })->name('ordenes-servicio.index');

    // Proyectos
    Route::get('proyectos', function () {
        return view('admin.proyectos');
    })->name('proyectos');

    Route::get('vista-proyectos', function () {
        return view('admin.vista-proyectos');
    })->name('vista-proyectos');

    // Tickets
    Route::get('tickets', function () {
        return view('admin.tickets');
    })->name('tickets.index');

    // Calendario
    Route::get('agencias', function () {
        return view('admin.agencias');
    })->name('agencias');

    Route::get('calendario', function () {
        return view('admin.calendario');
    })->name('calendario');

    // Facturación
    Route::get('facturas', function () {
        return view('admin.facturas');
    })->name('facturas');

    Route::get('cai', function () {
        return view('admin.cai');
    })->name('cai');

    // Reportes
    Route::get('reportes', function () {
        return view('admin.reportes');
    })->name('reportes');

    // Inventario
    Route::get('productos', function () {
        return view('admin.productos');
    })->name('productos');

    Route::get('kardex', function () {
        return view('admin.kardex');
    })->name('kardex');

    // Administración
    Route::get('gestion-db', function () {
        return view('admin.gestion-db');
    })->name('gestion-db');

    Route::get('bitacora', function () {
        return view('admin.bitacora');
    })->name('bitacora');

    Route::get('cambio-contrasena', function () {
        return view('admin.cambio-contrasena');
    })->name('cambio-contrasena');

    // Gestión Mantenimiento
    Route::get('mantenimiento/tickets', function () {
        return view('admin.mantenimiento-tickets');
    })->name('mantenimiento.tickets');

});

// Login route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
