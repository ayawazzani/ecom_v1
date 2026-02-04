@extends('layout')

@section('title', 'Accueil - CompasSport')

@section('content')

<!-- Section Hero -->
<div class="text-center my-5">
    <h1 class="fw-bold">Bienvenue à CompasSport</h1>
    <p class="lead">
        Produits de randonnée, camping et vêtements de sport outdoor pour les amoureux de la nature.
    </p>
    <a href="/apropos" class="btn btn-success mt-3">En savoir plus</a>
</div>

<!-- Section Catégories -->
<div class="row text-center my-5">
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('images/randonnee.jpg') }}" class="card-img-top" alt="Randonnée">
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
            <img src="{{ asset('images/camping.jpg') }}" class="card-img-top" alt="Camping">
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

<!-- Section Produits Dynamiques -->
<hr class="my-5">

<h2 class="text-center mb-4">Nos Produits</h2>

<div class="row">
    @forelse($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->titre }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->titre }}</h5>
                    <p class="card-text">
                        {{ Str::limit($article->contenu, 100) }}
                    </p>
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
