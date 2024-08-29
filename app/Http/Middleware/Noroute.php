<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Noroute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        
        // Route parametrini olish (bu misolda 'id')
        

        // Agar foydalanuvchi id si route parametriga teng bo'lmasa, 403 qaytarish
        if ($user->id == $user->id) {
            return redirect()->back();
        }
        return $next($request);
    }
}
