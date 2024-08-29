<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminOwnership
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
        $routeId = $request->route('user_id');

        // Agar foydalanuvchi id si route parametriga teng bo'lmasa, 403 qaytarish
        if ($user->id != $routeId) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
