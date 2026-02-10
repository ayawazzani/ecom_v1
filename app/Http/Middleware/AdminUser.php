<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUser
{
    public function handle(Request $request, Closure $next)
    {
        // إذا كان المستخدم مسجل ودوره admin، اسمح له بالمرور
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // إذا لم يكن أدمن، ارجع للصفحة الرئيسية مع رسالة خطأ
        return redirect('/')->with('error', "Accès réservé aux administrateurs.");
    }
}