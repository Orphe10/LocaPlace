<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AgenceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Vérifie si l'utilisateur est connecté en tant qu'agence
        if (Auth::guard('agence')->check()) {
            // Vérifie si l'agence est active
            if(auth('agence')->user()->is_active == false) {
                auth('agence')->logout(); // Déconnecte l'agence
                return redirect()->route('AgenceLogin')->with('error', 'Votre compte a été désactivé par l\'administrateur.');
            }
            return $next($request); // Passe à la prochaine requête si l'agence est active
        } else {
            return redirect()->route('AgenceLogin'); // Redirige vers la page de login si l'utilisateur n'est pas connecté
        }
    }
}
