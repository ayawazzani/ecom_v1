@extends('layout')

@section('title', 'Accueil - CompasSport')

@section('content')

<!-- Section Hero avec Background -->
<div class="hero text-center d-flex flex-column justify-content-center align-items-center"
     style="background: url('{{ asset('images/hero-bg.jpg') }}') center/cover no-repeat; height: 80vh; color: #F5F5F5;">
    <h1 class="fw-bold display-4" style="text-shadow: 2px 2px #2E7D32;">Bienvenue à CompasSport</h1>
    <p class="lead" style="text-shadow: 1px 1px #6D4C41;">
        Produits de randonnée, camping et vêtements de sport outdoor pour les amoureux de la nature.
    </p>
    <a href="/apropos" class="btn btn-orange btn-lg mt-3">En savoir plus</a>
</div>

<!-- Section Catégories -->
<div class="row text-center my-5">
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('images/randonnée.jpg') }}" class="card-img-top" alt="Randonnée">
            <div class="card-body">
                <h5 class="card-title">Randonnée</h5>
                <p class="card-text">
                    Équipements de qualité pour vos aventures en pleine nature.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('images/companing.jpg') }}" class="card-img-top" alt="Camping">
            <div class="card-body">
                <h5 class="card-title">Camping</h5>
                <p class="card-text">
                    Tentes, sacs de couchage et accessoires pour vos nuits à l'extérieur.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('images/sport.jpg') }}" class="card-img-top" alt="Sport Outdoor">
            <div class="card-body">
                <h5 class="card-title">Vêtements Sport Outdoor</h5>
                <p class="card-text">
                    Des vêtements confortables et résistants pour toutes vos activités.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Section Images / Inspirations -->
<div class="my-5">
    <div class="row text-center">
        <div class="col-md-3 mb-3"><img src="{{ asset('images/ski.jpg') }}" class="img-fluid rounded shadow" alt="Inspiration 1"></div>
        <div class="col-md-3 mb-3"><img src="{{ asset('images/travel.jpg') }}" class="img-fluid rounded shadow" alt="Inspiration 2"></div>
        <div class="col-md-3 mb-3"><img src="{{ asset('images/foot.jpg') }}" class="img-fluid rounded shadow" alt="Inspiration 3"></div>
        <div class="col-md-3 mb-3"><img src="{{ asset('images/kid.jpg') }}" class="img-fluid rounded shadow" alt="Inspiration 4"></div>
    </div>
</div>

<!-- Section Produits Dynamiques -->
<hr class="my-5">

<h2 class="text-center mb-4">Nos Produits</h2>

<div class="row">
    @forelse($articles as $article)
       <div class="col-md-4 mb-4">
            <div class="card h-100 shadow text-center">
                <img src="{{ asset($article->image) }}" class="card-img-top" style="width: 100%; height: auto;" alt="{{ $article->titre }}">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $article->titre }}</h5>
                    <p class="text-success fw-semibold">{{ $article->prix }} MAD</p>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($article->contenu, 60) }}</p>
                </div>
            </div>
        </div>
        

    @empty
        <p class="text-center text-muted">
            Aucun produit disponible pour le moment.
        </p>
    @endforelse
</div>

@endsection
