<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;

// Accueil
Route::get('/', [ArticleController::class, 'index']);

// Pages statiques
Route::get('/apropos', [PageController::class, 'apropos']);
Route::get('/contact', [PageController::class, 'contact']);

// Collection
Route::get('/collection', [ArticleController::class, 'collection'])->name('collection.index');
