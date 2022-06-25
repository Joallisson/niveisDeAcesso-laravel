<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() AND auth()->user()->client) { //Se o usuário estiver autenticado e for client
            return $next($request);
        }

        dd('Acesso Negado, você não é cliente');
        
    }
}
