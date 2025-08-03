<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewLoaderController extends Controller
{
    public function load(Request $request)
    {
        $view = $request->query('view');

        // Validación de seguridad
        if (empty($view) || str_contains($view, '..')) {
            abort(400, 'Invalid view name');
        }

        // Primero intentar cargar una vista parcial
        $partialViewName = 'admin.partials.' . $view;
        if (View::exists($partialViewName)) {
            return view($partialViewName)->render();
        }

        // Si no existe vista parcial, usar la vista completa y extraer contenido
        $viewName = 'admin.' . $view;
        if (!View::exists($viewName)) {
            abort(404, "View not found: {$viewName}");
        }

        try {
            // Renderizar la vista completa
            $html = view($viewName)->render();
            
            // Usar regex para extraer el contenido del main
            $pattern = '/<main[^>]*>(.*?)<\/main>/s';
            if (preg_match($pattern, $html, $matches)) {
                return $matches[1];
            }
            
            // Si no encuentra main, buscar div con bg-white p-6 rounded-lg shadow (contenido principal)
            $pattern = '/<div[^>]*class="[^"]*bg-white[^"]*p-6[^"]*rounded-lg[^"]*shadow[^"]*"[^>]*>(.*?)<\/div>/s';
            if (preg_match($pattern, $html, $matches)) {
                return $matches[1];
            }
            
            // Como último recurso, devolver todo el HTML
            return $html;
            
        } catch (\Exception $e) {
            return '<div class="flex justify-center items-center h-64"><div class="text-red-500"><i class="fas fa-exclamation-triangle mr-2"></i>Error: ' . $e->getMessage() . '</div></div>';
        }
    }
}
