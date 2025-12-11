<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role;

        // Jika role user tidak ada dalam daftar role yang diizinkan
        if (!in_array($userRole, $roles)) {
            return abort(403, 'Tidak memiliki akses');
        }

        return $next($request);
    }
}
