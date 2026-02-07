<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // الصفحة الرئيسية (Accueil)
    public function index(Request $request)
    {
        $categories = Category::all();
        $category_id = $request->query('category');

        if ($category_id) {
            $articles = Article::where('category_id', $category_id)->paginate(6);
            $articles->appends(['category' => $category_id]);
        } else {
            $articles = Article::paginate(3);
        }

        return view('accueil', compact('articles', 'categories'));
    }

    // صفحة Collection
    public function collection(Request $request)
    {
        $categories = Category::all();
        $category_id = $request->query('category');

        if ($category_id) {
            $articles = Article::where('category_id', $category_id)->paginate(6);
            $articles->appends(['category' => $category_id]);
        } else {
            $articles = Article::paginate(6);
        }

        return view('collection', compact('articles', 'categories'));
    }
}
