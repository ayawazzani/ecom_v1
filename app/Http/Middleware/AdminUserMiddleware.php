<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminUserMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // إذا لم يكن المستخدم متصل أو ليس ADMIN
        if (!$user || $user->role !== User::ADMIN_ROLE) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
