<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (\Auth::guest()) {
            return redirect()->route('honor.login');
        }

        // bendahara_kegiatan != admin
        if (\Auth::user()->role != $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
