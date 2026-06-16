<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // kalau role tidak sesuai
        if ($user->role !== $role) {
            abort(403, 'Kamu tidak punya akses ke halaman ini');
        }

        return $next($request);
    }
}