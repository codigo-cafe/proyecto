<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->rol_usuario == 'administrador') {
            return $next($request);
        }
        elseif (Auth::user()->rol_usuario == 'gerente') {
            return redirect('user');
        } 
        elseif (Auth::user()->rol_usuario == 'capataz') {
            return redirect('capataz');        
        }
    }
}