<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpaInitializer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Solo aplicar a rutas admin que no sean APIs o archivos
        if ($request->is('admin/*') && !$request->is('load-view') && !$request->ajax()) {
            // Agregar header para identificar que es una página SPA
            $response->headers->set('X-SPA-Page', 'true');
            
            // Agregar el viewName como header para JavaScript
            $path = $request->path();
            $viewName = $this->extractViewNameFromPath($path);
            $response->headers->set('X-SPA-View', $viewName);
        }
        
        return $response;
    }
    
    /**
     * Extraer el nombre de la vista desde el path
     */
    private function extractViewNameFromPath($path)
    {
        $match = preg_match('/admin\/(.+)$/', $path, $matches);
        return $match ? $matches[1] : 'dashboard';
    }
}
