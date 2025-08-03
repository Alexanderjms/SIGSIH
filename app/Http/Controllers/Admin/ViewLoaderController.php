<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewLoaderController extends Controller
{
    public function load(Request $request)
    {
        $view = $request->get('view');
        
        // Validación de seguridad
        if (!$view || !preg_match('/^[a-zA-Z0-9_-]+$/', $view)) {
            return response('Invalid view', 400);
        }

        // Lista de vistas válidas para mayor seguridad
        $validViews = [
            'dashboard', 'gestion-usuarios', 'parametros', 'configuracion-acceso',
            'gestion-empresas', 'cotizaciones', 'solicitudes', 'gestion-ordenes',
            'vista-proyectos', 'proyectos', 'tickets', 'agencias', 'calendario',
            'facturas', 'cai', 'reportes', 'productos', 'kardex', 'gestion-personas',
            'perfil', 'cambio-contrasena', 'bitacora', 'gestion-db', 'mantenimiento-general'
        ];

        if (!in_array($view, $validViews)) {
            return response('View not allowed', 403);
        }

        // Primero verificar si existe una vista parcial específica
        $partialView = "admin.partials.{$view}";
        if (View::exists($partialView)) {
            // Incluir header para vistas parciales
            $headerHtml = view('partials.admin-header')->render();
            $contentHtml = view($partialView)->render();
            
            return $headerHtml . '<div class="bg-white p-6 rounded-lg shadow">' . $contentHtml . '</div>';
        }

        // Si no existe vista parcial, intentar cargar la vista completa y extraer contenido
        $fullView = "admin.{$view}";
        if (!View::exists($fullView)) {
            return response('View not found', 404);
        }

        try {
            $fullHtml = view($fullView)->render();
            
            // Extraer solo el contenido principal usando regex
            // Buscar el contenido entre las etiquetas del layout
            if (preg_match('/<div class="bg-white p-6 rounded-lg shadow">(.*?)<\/div>\s*<\/main>/s', $fullHtml, $matches)) {
                return $matches[1];
            }
            
            // Fallback: buscar cualquier div con clase bg-white
            if (preg_match('/<div[^>]*class="[^"]*bg-white[^"]*"[^>]*>(.*?)<\/div>/s', $fullHtml, $matches)) {
                return $matches[1];
            }
            
            return $fullHtml;
            
        } catch (\Exception $e) {
            return response('Error loading view: ' . $e->getMessage(), 500);
        }
    }
}
