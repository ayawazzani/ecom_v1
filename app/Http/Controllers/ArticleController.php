<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Article;
use App\Models\Category;
use Cloudinary\Cloudinary;

class ArticleController extends Controller
{
    /**
     * عرض صفحة إضافة مقال (Admin)
     */
    public function create()
    {
        $categories = Category::all();
        return view('addarticle', compact('categories'));
    }

    /**
     * تخزين المقال + رفع الصورة إلى Cloudinary (Admin)
     */
    public function store(AddProductRequest $request)
    {
        $validatedData = $request->validated();

        $imageUrl = null;

        // رفع الصورة إلى Cloudinary إذا تم اختيارها
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            $result = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'articles']
            );

            $imageUrl = $result['secure_url'];
        }

        // حفظ البيانات في قاعدة البيانات + ربط بالكاتب الحالي
        Article::create([
            'titre'       => $request->input('titre'),
            'prix'        => $request->input('prix'),
            'contenu'     => $request->input('contenu'),
            'category_id' => $request->input('category_id'),
            'user_id'     => auth()->id(), // الربط التلقائي بالكاتب
            'image'       => $imageUrl,
        ]);

        return back()->with('success', 'Le produit a été ajouté avec succès à CompasSport !');
    }

    /**
     * الصفحة الرئيسية (Accueil)
     */
    public function accueil(Request $request)
    {
        $categories = Category::all();
        $category_id = $request->query('category');

        $articles = $category_id
            ? Article::where('category_id', $category_id)
                     ->with('category', 'user') // تحميل العلاقات لتجنب N+1
                     ->paginate(6)
                     ->appends(['category' => $category_id])
            : Article::with('category', 'user')->paginate(3);

        return view('accueil', compact('articles', 'categories'));
    }

    /**
     * صفحة Collection
     */
    public function collection(Request $request)
    {
        $categories = Category::all();
        $category_id = $request->query('category');

        $articles = $category_id
            ? Article::where('category_id', $category_id)
                     ->with('category', 'user')
                     ->paginate(6)
                     ->appends(['category' => $category_id])
            : Article::with('category', 'user')->paginate(6);

        return view('collection', compact('articles', 'categories'));
    }

    /**
     * البحث (React API)
     */
    public function filter(Request $request)
    {
        $query = $request->input('p');
        $articles = Article::where('titre', 'like', "%$query%")
                           ->with('category', 'user')
                           ->get();
        return response()->json($articles);
    }

    /**
     * عرض مقال مفرد (Public)
     */
    public function show($id)
    {
        $article = Article::with('category', 'user')->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * قائمة جميع المقالات (Admin)
     */
    public function index()
    {
        $articles = Article::with('category', 'user')->get();
        return view('admin.articles', compact('articles'));
    }

    /**
     * تعديل مقال (Admin)
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * تحديث مقال (Admin)
     */
    public function update(AddProductRequest $request, $id)
    {
        $validatedData = $request->validated();
        $article = Article::findOrFail($id);

        $article->titre       = $request->input('titre');
        $article->contenu     = $request->input('contenu');
        $article->prix        = $request->input('prix');
        $article->category_id = $request->input('category_id');
        $article->user_id     = auth()->id(); // تحديث الكاتب تلقائياً

        // تحديث الصورة إذا تم اختيار صورة جديدة
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            $result = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'articles']
            );

            $article->image = $result['secure_url'];
        }

        $article->save();

        return back()->with('successupdate', 'Article mis à jour avec succès !');
    }

    /**
     * حذف مقال (Admin)
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->image) {
            try {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key'    => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                ]);

                $urlParts = explode('/', $article->image);
                $fileNameWithExt = end($urlParts);
                $publicId = 'articles/' . pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                $cloudinary->uploadApi()->destroy($publicId);
            } catch (\Exception $e) {
                // سجل الخطأ أو تجاهله
            }
        }

        $article->delete();

        return back()->with('successdelete', 'Article et son image ont été supprimés avec succès !');
    }

    /**
     * Espace Client (USER)
     * عرض المنتجات في حالة Sale (solde = 1)
     */
    public function espaceclient()
    {
        $produits = Article::where('solde', 1)->with('category')->get();
        return view('espaceclient', compact('produits'));
    }

    public function produitsSolde()
    {
        $articles = Article::where('is_solde', 1)->with('category', 'user')->get();
        return view('produits_solde', compact('articles'));
    }
}