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

    // Dashboard
    Route::get('dashboard', fn() => view('layouts.admin')->with('partialView', 'admin.partials.dashboard'))->name('dashboard');

    // Seguridad
    Route::get('gestion-usuarios', fn() => view('layouts.admin')->with('partialView', 'admin.partials.gestion-usuarios'))->name('gestion-usuarios');
    Route::get('parametros', fn() => view('layouts.admin')->with('partialView', 'admin.partials.parametros'))->name('parametros');
    Route::get('configuracion-acceso', fn() => view('layouts.admin')->with('partialView', 'admin.partials.configuracion-acceso'))->name('configuracion-acceso');

    // Clientes
    Route::get('gestion-empresas', fn() => view('layouts.admin')->with('partialView', 'admin.partials.gestion-empresas'))->name('gestion-empresas');
    Route::get('cotizaciones', fn() => view('layouts.admin')->with('partialView', 'admin.partials.cotizaciones'))->name('cotizaciones');

    // Solicitudes
    Route::get('solicitudes', fn() => view('layouts.admin')->with('partialView', 'admin.partials.solicitudes'))->name('solicitudes');

    // Órdenes de Servicio
    Route::get('gestion-ordenes', fn() => view('layouts.admin')->with('partialView', 'admin.partials.gestion-ordenes'))->name('gestion-ordenes');

    // Proyectos
    Route::get('vista-proyectos', fn() => view('layouts.admin')->with('partialView', 'admin.partials.vista-proyectos'))->name('vista-proyectos');
    Route::get('proyectos', fn() => view('layouts.admin')->with('partialView', 'admin.partials.proyectos'))->name('proyectos');

    // Tickets
    Route::get('tickets', fn() => view('layouts.admin')->with('partialView', 'admin.partials.tickets'))->name('tickets');

    // Agencias y Calendario
    Route::get('agencias', fn() => view('layouts.admin')->with('partialView', 'admin.partials.agencias'))->name('agencias');
    Route::get('calendario', fn() => view('layouts.admin')->with('partialView', 'admin.partials.calendario'))->name('calendario');

    // Facturas y CAI
    Route::get('facturas', fn() => view('layouts.admin')->with('partialView', 'admin.partials.facturas'))->name('facturas');
    Route::get('cai', fn() => view('layouts.admin')->with('partialView', 'admin.partials.cai'))->name('cai');

    // Reportes
    Route::get('reportes', fn() => view('layouts.admin')->with('partialView', 'admin.partials.reportes'))->name('reportes');

    Route::get('reportes-header', function () {
        $fecha = now()->format('d-M-Y');
        $modulo = request('modulo', 'General');

        $vistas = [
            'Usuarios' => 'admin.reporte-usuarios',
            'Parametros' => 'admin.reporte-parametros',
            'ConfiguracionAccesos' => 'admin.reporte-configuracion-accesos',
            'Empresas' => 'admin.reporte-empresas',
            'Solicitudes' => 'admin.reporte-solicitudes',
            'Tickets' => 'admin.reporte-tickets',
            'Agencias' => 'admin.reporte-agencias',
            'Calendario' => 'admin.reporte-calendario',
            'Facturas' => 'admin.reporte-facturas',
        ];

        if (isset($vistas[$modulo])) {
            return view($vistas[$modulo], compact('fecha', 'modulo'));
        }

        $cotizacion = 'RPT-' . now()->format('Ymd') . '001';
        return view('admin.reportes-header-ejemplo', compact('fecha', 'cotizacion', 'modulo'));
    })->name('reportes-header');

    // Inventario
    Route::get('productos', fn() => view('layouts.admin')->with('partialView', 'admin.partials.productos'))->name('productos');
    Route::get('kardex', fn() => view('layouts.admin')->with('partialView', 'admin.partials.kardex'))->name('kardex');

    // Catálogo (solo listar nombres para no repetir)
    $catalogos = [
        'genero', 'estados-solicitud', 'categorias-ingresos-gastos', 'estados-proyecto',
        'estados-tickets', 'ubicaciones', 'estados-calendario', 'admin-facturas',
        'estados-cai', 'tipo-visita', 'tipo-persona', 'perfil', 'tipo-producto',
        'tipo-movimiento', 'servicios-realizados', 'acciones-realizadas', 'servicios-factura',
        'tipo-objeto'
    ];

    foreach ($catalogos as $cat) {
        Route::get("catalogo-$cat", fn() => view('layouts.admin')->with('partialView', "admin.partials.catalogo-$cat"))->name("catalogo-$cat");
    }

    // Administración
    Route::get('gestion-personas', fn() => view('layouts.admin')->with('partialView', 'admin.partials.gestion-personas'))->name('gestion-personas');
    Route::get('perfil', fn() => view('layouts.admin')->with('partialView', 'admin.partials.perfil'))->name('perfil');
    Route::get('cambio-contrasena', fn() => view('layouts.admin')->with('partialView', 'admin.partials.cambio-contrasena'))->name('cambio-contrasena');
    Route::get('bitacora', fn() => view('layouts.admin')->with('partialView', 'admin.partials.bitacora'))->name('bitacora');
    Route::get('gestion-db', fn() => view('layouts.admin')->with('partialView', 'admin.partials.gestion-db'))->name('gestion-db');

    // Mantenimiento
    Route::get('mantenimiento-general', fn() => view('layouts.admin')->with('partialView', 'admin.partials.mantenimiento-general'))->name('mantenimiento-general');

    // Vistas PDF o externas
    Route::get('detalle-cotizacion', fn() => view('admin.detalle-cotizacion'))->name('detalle-cotizacion');
    Route::get('detalle-orden', fn() => view('admin.detalle-orden'))->name('detalle-orden');
    Route::get('formato-factura', fn() => view('admin.formato-factura'))->name('formato-factura');
    Route::get('proyecto-pdf', fn() => view('admin.proyecto-pdf'))->name('proyecto-pdf');
    Route::get('formato-reporte', fn() => view('admin.formato-reporte'))->name('formato-reporte');

    // Reportes PDF
    Route::get('reporte-kardex', fn() => view('admin.reporte-kardex', ['fecha' => now()->format('d-M-Y'), 'modulo' => 'Kardex']))->name('reporte-kardex');
    Route::get('kardex/reporte/pdf', fn() => view('admin.reporte-kardex', ['fecha' => now()->format('d-M-Y'), 'modulo' => 'Kardex', 'pdf' => true]))->name('kardex.reporte.pdf');

    Route::get('reporte-productos', fn() => view('admin.reporte-productos', ['fecha' => now()->format('d-M-Y'), 'modulo' => 'Productos']))->name('reporte-productos');
    Route::get('productos/reporte/pdf', fn() => view('admin.reporte-productos', ['fecha' => now()->format('d-M-Y'), 'modulo' => 'Productos', 'pdf' => true]))->name('productos.reporte.pdf');
});

// Ruta externa para reportes
Route::get('/admin/reportes-header', function (\Illuminate\Http\Request $request) {
    $modulo = $request->query('modulo', '');
    $fecha = $request->query('fecha', now()->format('d-M-Y'));
    $view = match (strtolower($modulo)) {
        'usuarios' => 'admin.reporte-usuarios',
        'parametros' => 'admin.reporte-parametros',
        'configuracion de accesos' => 'admin.reporte-configuracion-accesos',
        'empresas' => 'admin.reporte-empresas',
        'solicitudes' => 'admin.reporte-solicitudes',
        'tickets' => 'admin.reporte-tickets',
        'agencias' => 'admin.reporte-agencias',
        'calendario' => 'admin.reporte-calendario',
        'facturas' => 'admin.reporte-facturas',
        'cai' => 'admin.reporte-cai',
        'bitacora' => 'admin.reporte-bitacora',
        'gestion de personas' => 'admin.reporte-gestion-personas',
        default => 'admin.reporte-generico',
    };
    return view($view, compact('fecha', 'modulo'));
});

// Login
Route::get('/login', fn() => view('auth.login'))->name('login');