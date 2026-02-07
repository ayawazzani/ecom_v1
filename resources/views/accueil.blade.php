@extends('layout')

@section('title', 'Accueil - CompasSport')

@section('content')

<div class="hero text-center d-flex flex-column justify-content-center align-items-center"
     style="background: url('{{ asset('images/hero-bg.jpg') }}') center/cover no-repeat; height: 80vh; color: #F5F5F5;">
    <h1 class="fw-bold display-4" style="text-shadow: 2px 2px #2E7D32;">Bienvenue à CompasSport</h1>
    <p class="lead" style="text-shadow: 1px 1px #6D4C41;">
        Produits de randonnée, camping et vêtements de sport outdoor pour les amoureux de la nature.
    </p>
    <a href="/apropos" class="btn btn-orange btn-lg mt-3">En savoir plus</a>
</div>

<div class="row text-center my-5">
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0" style="border-radius: 15px;">
            <img src="{{ asset('images/randonnée.jpg') }}" class="card-img-top" alt="Randonnée" style="border-radius: 15px 15px 0 0;">
            <div class="card-body">
                <h5 class="card-title fw-bold">Randonnée</h5>
                <p class="card-text text-muted">Équipements de qualité pour vos aventures en pleine nature.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0" style="border-radius: 15px;">
            <img src="{{ asset('images/companing.jpg') }}" class="card-img-top" alt="Randonnée" style="border-radius: 15px 15px 0 0;">
            <div class="card-body">
                <h5 class="card-title fw-bold">Camping</h5>
                <p class="card-text text-muted">    Tentes, sacs de couchage et accessoires pour vos nuits à l'extérieur.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0" style="border-radius: 15px;">
            <img src="{{ asset('images/ins2.jpg') }}" class="card-img-top" alt="Randonnée" style="border-radius: 15px 15px 0 0; width: 100%; height: 250px;">
            <div class="card-body">
                <h5 class="card-title fw-bold">Vêtements Sport Outdoor</h5>
                <p class="card-text text-muted"> Des vêtements confortables et résistants pour toutes vos activités.</p>
            </div>
        </div>
    </div>
    </div>

<hr class="my-5">
<h2 class="text-center mb-4 fw-bold" style="color: #1b3a2e;">Explorez Nos Catégories</h2>

<div class="text-center mb-5">
    {{-- زر "Tous" يوجه لصفحة الـ Collection الرئيسية --}}
    <a href="{{ route('collection.index') }}" class="btn btn-category px-4 py-2">
        Voir Tout le Catalogue
    </a>

    <div class="mt-3">
        @foreach($categories as $category)
            {{-- توجيه المستخدم لصفحة المجموعة مع فلتر التصنيف المختار --}}
            <a href="{{ route('collection.index', ['category' => $category->id]) }}" 
               class="btn btn-outline-success m-1 rounded-pill px-4">
               {{ $category->nom }}
            </a>
        @endforeach
    </div>
</div>

<div class="row">
    {{-- عرض عينة من المنتجات فقط (أول 6 منتجات مثلاً) --}}
    @forelse($articles as $article)
       <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm text-center product-card border-0">
                <img src="{{ asset($article->image) }}" 
                    class="card-img-top" 
                    style="width: 100%; height: 220px; object-fit: contain; background-color: #f8f9fa; padding: 10px;" 
                    alt="{{ $article->titre }}">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $article->titre }}</h5>
                    <p class="text-success fw-semibold">{{ $article->prix }} MAD</p>
                    <a href="{{ route('collection.index') }}" class="btn btn-sm btn-link text-decoration-none text-muted">Voir dans la collection</a>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">Aucun produit disponible pour le moment.</p>
    @endforelse
</div>

<style>
    /* ستايل خاص بأزرار التصنيفات في الرئيسية */
    .btn-category {
        background-color: #1b3a2e;
        color: white;
        border-radius: 30px;
        font-weight: bold;
        transition: 0.3s;
    }
    .btn-category:hover {
        background-color: #2d5a27;
        color: #fff;
        transform: translateY(-3px);
    }
    .product-card {
        border-radius: 20px;
        transition: 0.3s;
    }
    .product-card:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>

@endsection