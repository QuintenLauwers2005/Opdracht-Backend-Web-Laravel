<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * Middleware = poortwachter die checkt of iemand toegang heeft
     * Deze middleware controleert of de gebruiker een admin is
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Controleer 2 dingen:
        // 1. Is de gebruiker ingelogd? (auth()->check())
        // 2. Heeft de gebruiker is_admin = true? (auth()->user()->is_admin)
        // Als één van beide NIET waar is (! = not), blokkeer dan de toegang
        if(!auth()->check() || !auth()->user()->is_admin){
            // Stop de request en toon een 403 Forbidden foutmelding
            abort(403, 'Geen toegang. Alleen admins hebben toegang tot deze pagina.');
        }

        // Als de controle slaagt, laat de gebruiker door naar de volgende stap
        // $next($request) = ga verder met de request (roep de controller aan)
        return $next($request);
    }
}
