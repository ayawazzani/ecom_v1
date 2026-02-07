<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PageController extends Controller
{
    // دالة الصفحة الرئيسية - تعرض فقط 3 منتجات
    public function index()
    {
        // جلب أحدث 3 منتجات فقط ليظل شكل الصفحة الرئيسية مرتباً
        $articles = Article::latest()->take(3)->get(); 
        
        // نرسل البيانات لصفحة 'accueil' (أو اسم صفحتك الرئيسية)
        return view('accueil', compact('articles'));
    }

    public function apropos()
    {
        return view('apropos');
    }

    public function contact()
    {
        return view('contact');
    }

    // دالة صفحة المجموعة - تعرض جميع المنتجات
    public function collection()
    {
        // هنا جلبنا الكل بدون تحديد العدد
        $articles = Article::all(); 
        return view('collection', compact('articles'));
    }
}