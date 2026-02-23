<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Pages publiques (Visiteurs)
|--------------------------------------------------------------------------
*/

// Accueil (صفحة الرئيسية)
Route::get('/', [ArticleController::class, 'accueil'])->name('articles.accueil');

// Pages statiques
Route::get('/apropos', [PageController::class, 'apropos'])->name('apropos');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Collection (store)
Route::get('/collection', [ArticleController::class, 'collection'])->name('collection.index');

// Show : afficher un article (public)
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');


/*
|--------------------------------------------------------------------------
| Routes Auth (Laravel UI)
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Partie Admin (Middleware: adminuser)
|--------------------------------------------------------------------------
*/
Route::middleware(['adminuser'])->group(function () {
    // Formulaire ajout article
    Route::get('/admin/add-article', [ArticleController::class, 'create'])
        ->name('articles.create');

    // Enregistrement article
    Route::post('/admin/add-article', [ArticleController::class, 'store'])
        ->name('articles.store');

    // Liste des articles (Admin)
    Route::get('/admin/articles', [ArticleController::class, 'index'])
        ->name('admin.articles');

    // Edit : afficher formulaire de modification
    Route::get('/admin/articles/{id}/edit', [ArticleController::class, 'edit'])
        ->name('articles.edit');

    // Update : traiter la modification
    Route::put('/admin/articles/{id}', [ArticleController::class, 'update'])
        ->name('articles.update');

    // Delete : supprimer article
    Route::delete('/admin/articles/{id}', [ArticleController::class, 'destroy'])
        ->name('articles.destroy');
});


/*
|--------------------------------------------------------------------------
| Espace Client (Middleware: useruser)
|--------------------------------------------------------------------------
*/
Route::middleware(['useruser'])->group(function () {
    Route::get('/espaceclient', [ArticleController::class, 'espaceclient'])
        ->name('espaceclient.index');
});
Route::middleware(['adminuser'])->group(function () {
    Route::get('/admin/add-article', [ArticleController::class,'create'])->name('articles.create');
    Route::post('/admin/add-article', [ArticleController::class,'store'])->name('articles.store');
    Route::get('/admin/articles', [ArticleController::class,'index'])->name('admin.articles');
    Route::get('/admin/articles/{id}/edit', [ArticleController::class,'edit'])->name('articles.edit');
    Route::put('/admin/articles/{id}', [ArticleController::class,'update'])->name('articles.update');
    Route::delete('/admin/articles/{id}', [ArticleController::class,'destroy'])->name('articles.destroy');
});

Route::middleware(['useruser'])->group(function () {
    Route::get('/espaceclient', [ArticleController::class,'espaceclient'])->name('espaceclient.index');
});


Route::get('/profile', function () { return view('profile'); })->middleware('auth');
Route::get('/produits-solde', function () { return view('produits_solde'); })->middleware('auth');
Route::get('/produits-solde', [ArticleController::class, 'produitsSolde'])->middleware('auth');
Route::middleware(['auth','useruser'])->group(function() {
    // عرض محتوى السلة
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');

    // إضافة منتج للسلة
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');

    // تعديل كمية منتج
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');

    // حذف منتج من السلة
    Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');

});
