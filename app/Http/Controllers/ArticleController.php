<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Article;
use App\Models\Category;
use Cloudinary\Cloudinary;

class ArticleController extends Controller
{
    // عرض صفحة إضافة مقال
    public function create()
    {
        $categories = Category::all();
        return view('addarticle', compact('categories'));
    }

    // تخزين المقال + رفع الصورة إلى Cloudinary
    public function store(AddProductRequest $request)
    {
        // التحقق من البيانات (تأكد أن الحقول موجودة في AddProductRequest)
        $validatedData = $request->validated();

        $imageUrl = null;

        // 1️⃣ التحقق من وجود صورة ورفعها إلى Cloudinary
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            // عملية الرفع
            $result = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'articles']
            );

            // الحصول على الرابط المباشر (هذا هو الرابط الذي سنخزنه في الداتابيز)
            $imageUrl = $result['secure_url'];
        }

        // 2️⃣ حفظ البيانات في قاعدة البيانات
        // ملاحظة: تأكد أن حقل 'image' في جدول 'articles' يقبل نصوصاً طويلة (String)
        Article::create([
            'titre'       => $request->input('titre'),
            'prix'        => $request->input('prix'),
            'contenu'     => $request->input('contenu'),
            'category_id' => $request->input('category_id'),
            'image'       => $imageUrl, // هنا يتم تخزين الرابط السحابي
        ]);

        return back()->with(
            'success',
            'Le produit a été ajouté avec succès à CompasSport !'
        );
    }
    // الصفحة الرئيسية
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
