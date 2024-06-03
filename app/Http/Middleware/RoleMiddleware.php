<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (! $request->user() || $request->user()->rol != $role) {
            // abort(403, 'Acceso no autorizado.');
            return Redirect::route('home')->with('error', 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
