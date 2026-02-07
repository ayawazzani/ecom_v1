@extends('layout')

@section('title', 'Notre Collection - CompasSport')

@section('content')
<div class="container my-5">
    <div class="row align-items-end mb-5">
        <div class="col-md-8">
            <h1 class="fw-bold display-5" style="color: #2d5a27;">Notre <span style="color: #4CAF50;">Collection</span></h1>
            <p class="text-muted lead">Équipez-vous pour l'aventure avec nos produits sélectionnés pour leur qualité.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <div class="dropdown">
                <button class="btn btn-light shadow-sm dropdown-toggle rounded-pill px-4" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-sort-down me-2"></i>Trier par
                </button>
                <ul class="dropdown-menu border-0 shadow">
                    <li><a class="dropdown-item" href="#">Prix croissant</a></li>
                    <li><a class="dropdown-item" href="#">Prix décroissant</a></li>
                    <li><a class="dropdown-item" href="#">Nouveautés</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-3 d-none d-lg-block">
            <div class="sticky-top" style="top: 100px; z-index: 10;">
                <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
                    <h5 class="fw-bold mb-4"><i class="bi bi-filter-left me-2"></i>Filtres</h5>
                    
                    <label class="fw-bold small text-uppercase mb-3">Catégories</label>
                    <div class="d-flex flex-column gap-2 mb-4">
                        <a href="{{ route('collection.index') }}" class="filter-link {{ request('category') ? '' : 'active' }}">
                            Tout Voir
                        </a>
                        @foreach($categories as $cat)
                            <a href="{{ route('collection.index', ['category' => $cat->id]) }}"
                               class="filter-link {{ request('category') == $cat->id ? 'active' : '' }}">
                                {{ $cat->nom }}
                            </a>
                        @endforeach
                    </div>

                    <label class="fw-bold small text-uppercase mb-3">Budget (MAD)</label>
                    <input type="range" class="form-range custom-range" min="0" max="2000" id="priceRange">
                    <div class="d-flex justify-content-between small text-muted mt-2">
                        <span>0 MAD</span>
                        <span>2000 MAD</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row g-4">
                @foreach($articles as $article)
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100 border-0 shadow-sm product-card overflow-hidden">
                        <div class="position-relative bg-light">
                            <img src="{{ asset($article->image) }}" 
                                 class="card-img-top p-4 img-fluid" 
                                 alt="{{ $article->titre }}" 
                                 style="height: 250px; object-fit: contain;">
                            
                            <div class="product-overlay">
                                <button class="btn btn-white shadow-sm rounded-circle mx-1"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-white shadow-sm rounded-circle mx-1"><i class="bi bi-heart"></i></button>
                            </div>
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold mb-2" style="font-size: 1.1rem; color: #333;">{{ $article->titre }}</h5>
                            <p class="text-success fw-bold fs-5 mb-2">{{ $article->prix }} MAD</p>
                            <p class="text-muted small mb-3">
                                {{ Str::limit($article->contenu, 60) }}
                            </p>
                            <button class="btn btn-success w-100 rounded-pill py-2 fw-bold shadow-sm buy-btn">
                                <i class="bi bi-cart-plus me-2"></i>Ajouter au panier
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $articles->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>

<style>
    /* التنسيق الخاص بالترقيم (Pagination) */
    .pagination {
        display: flex;
        gap: 8px;
        list-style: none;
        padding: 0;
    }

    .pagination li a, 
    .pagination li span {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 15px;
        text-decoration: none;
        border: 1px solid #2d5a27;
        border-radius: 8px;
        color: #2d5a27;
        background: white;
        font-weight: bold;
        transition: 0.3s;
    }

    .pagination li.active span {
        background-color: #143126 !important; /* اللون الأخضر الداكن */
        color: white !important;
        border-color: #143126;
    }

    .pagination li.disabled span {
        color: #ccc;
        border-color: #eee;
        cursor: not-allowed;
    }

    .pagination li a:hover:not(.disabled) {
        background-color: #e9f5ea;
    }

    /* Product Card Styling */
    .product-card {
        border-radius: 25px !important;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .product-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }

    /* Image Overlay */
    .product-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(76, 175, 80, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: 0.3s ease;
    }
    .product-card:hover .product-overlay {
        opacity: 1;
    }

    /* Filter Links */
    .filter-link {
        color: #666;
        text-decoration: none;
        font-size: 0.9rem;
        padding: 5px 0;
        transition: 0.2s;
    }
    .filter-link:hover, .filter-link.active {
        color: #4CAF50;
        padding-left: 5px;
        font-weight: bold;
    }

    /* Buttons */
    .buy-btn {
        background-color: #4CAF50;
        border: none;
        transition: 0.3s;
    }
    .buy-btn:hover {
        background-color: #2d5a27;
        transform: scale(1.02);
    }
    .btn-white {
        background: white;
        border: none;
        width: 40px;
        height: 40px;
    }

    /* Custom Range Slider */
    .custom-range::-webkit-slider-thumb {
        background: #4CAF50;
    }
    .custom-pagination {
        display: flex;
        list-style: none;
        padding: 0;
        gap: 8px;
        align-items: center;
    }

    .custom-pagination li a, 
    .custom-pagination li span {
        display: block;
        padding: 8px 16px;
        border: 1px solid #143126; /* اللون الأخضر الداكن لموقعك */
        border-radius: 6px;
        color: #143126;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
        background-color: white;
    }

    /* الصفحة النشطة - خلفية خضراء داكنة */
    .custom-pagination li.active span {
        background-color: #143126; 
        color: white;
        border-color: #143126;
    }

    /* الأزرار المعطلة */
    .custom-pagination li.disabled span {
        color: #ccc;
        border-color: #eee;
        background-color: #fcfcfc;
        cursor: not-allowed;
    }

    /* تأثير التمرير */
    .custom-pagination li a:hover {
        background-color: #e9f0ee;
    }
</style>
@endsection