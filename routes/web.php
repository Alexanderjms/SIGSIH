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
        return view('layouts.admin')->with('partialView', 'admin.partials.dashboard');
    })->name('dashboard');

    // Seguridad
    Route::get('gestion-usuarios', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.gestion-usuarios');
    })->name('gestion-usuarios');

    Route::get('parametros', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.parametros');
    })->name('parametros');

    Route::get('configuracion-acceso', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.configuracion-acceso');
    })->name('configuracion-acceso');

    // Clientes
    Route::get('gestion-empresas', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.gestion-empresas');
    })->name('gestion-empresas');

    Route::get('cotizaciones', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.cotizaciones');
    })->name('cotizaciones');

    // Solicitudes
    Route::get('solicitudes', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.solicitudes');
    })->name('solicitudes');

    // Órdenes de Servicio
    Route::get('gestion-ordenes', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.gestion-ordenes');
    })->name('gestion-ordenes');

    // Proyectos
    Route::get('vista-proyectos', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.vista-proyectos');
    })->name('vista-proyectos');

    Route::get('proyectos', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.proyectos');
    })->name('proyectos');

    // Tickets
    Route::get('tickets', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.tickets');
    })->name('tickets');

    // Calendario
    Route::get('agencias', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.agencias');
    })->name('agencias');

    Route::get('calendario', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.calendario');
    })->name('calendario');

    // Facturación
    Route::get('facturas', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.facturas');
    })->name('facturas');

    Route::get('cai', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.cai');
    })->name('cai');

    // Reportes
    Route::get('reportes', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.reportes');
    })->name('reportes');

    // Inventario
    Route::get('productos', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.productos');
    })->name('productos');

    Route::get('kardex', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.kardex');
    })->name('kardex');

    // Catálogo
    Route::get('catalogo-genero', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-genero');
    })->name('catalogo-genero');

    Route::get('catalogo-estados-solicitud', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-estados-solicitud');
    })->name('catalogo-estados-solicitud');

    Route::get('catalogo-categorias-ingresos-gastos', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-categorias-ingresos-gastos');
    })->name('catalogo-categorias-ingresos-gastos');

    Route::get('catalogo-estados-proyecto', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-estados-proyecto');
    })->name('catalogo-estados-proyecto');

    Route::get('catalogo-estados-tickets', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-estados-tickets');
    })->name('catalogo-estados-tickets');

    Route::get('catalogo-ubicaciones', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-ubicaciones');
    })->name('catalogo-ubicaciones');

    Route::get('catalogo-estados-calendario', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-estados-calendario');
    })->name('catalogo-estados-calendario');

    Route::get('catalogo-admin-facturas', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-admin-facturas');
    })->name('catalogo-admin-facturas');

    Route::get('catalogo-estados-cai', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-estados-cai');
    })->name('catalogo-estados-cai');

    Route::get('catalogo-tipo-visita', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.catalogo-tipo-visita');
    })->name('catalogo-tipo-visita');

    // Administración
    Route::get('gestion-personas', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.gestion-personas');
    })->name('gestion-personas');

    Route::get('perfil', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.perfil');
    })->name('perfil');

    Route::get('cambio-contrasena', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.cambio-contrasena');
    })->name('cambio-contrasena');

    Route::get('bitacora', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.bitacora');
    })->name('bitacora');

    Route::get('gestion-db', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.gestion-db');
    })->name('gestion-db');

    // Mantenimiento
    Route::get('mantenimiento-general', function () {
        return view('layouts.admin')->with('partialView', 'admin.partials.mantenimiento-general');
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
