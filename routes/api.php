<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});


// 1️⃣ CRUD API للـ articles

Route::get('/articles', [ArticleController::class, 'index']); 
Route::get('/articles/{id}', [ArticleController::class, 'show']); 
Route::post('/articles', [ArticleController::class, 'store']); 
Route::put('/articles/{id}', [ArticleController::class, 'update']);
Route::delete('/articles/{id}', [ArticleController::class, 'destroy']); 
Route::get('/filter', [ArticleController::class, 'filter']);   

// 2️⃣ فلترة المقالات حسب العنوان
Route::get('/filter', function (\Illuminate\Http\Request $request) {
    $query = $request->input('p');
    $articles = \App\Models\Article::where('titre', 'like', "%$query%")->get();
    return response()->json($articles);
});

