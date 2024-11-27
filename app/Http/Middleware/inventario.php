<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class inventario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está autenticado y tiene el rol "inventario"
        if (Auth::check() && Auth::user()->hasRole('inventario')) {
            return $next($request);
        }

        // Redirige a la página principal si no tiene acceso
        //return redirect('/')->with('error', 'No tienes permiso para acceder a esta sección.');
        return response()->json(['message' => 'Acceso denegado. No tienes permisos para esta acción.'], 403);
   
    }
}
