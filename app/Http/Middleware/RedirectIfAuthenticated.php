<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;

                case 'kegiatan':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('pajak.home');
                }
                break;

                case 'honor':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('honor.home');
                }
                break;

                case 'pembukuan':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('pembukuan.home');
                }
                break;


            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;
        }
        return $next($request);
    }
}
