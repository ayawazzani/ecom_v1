@extends('layout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark" style="font-family: 'Playfair Display', serif;">🏷️ Produits en solde</h2>
        <span class="badge bg-danger rounded-pill px-4 py-2 shadow-sm">OFFRES SPÉCIALES</span>
    </div>

    <div class="row">
        @forelse($articles as $article)
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative hover-shadow">
                    
                    @if($article->discount_percentage > 0)
                        <span class="position-absolute top-0 start-0 bg-danger text-white px-3 py-1 m-2 fw-bold rounded-pill" style="z-index: 1; font-size: 0.8rem;">
                            -{{ $article->discount_percentage }}%
                        </span>
                    @endif

                   <img src="{{ Str::startsWith($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" 
     class="card-img-top" 
     alt="{{ $article->titre }}" 
    style="height: 250px; object-fit: contain;"
     onerror="this.onerror=null;this.src='https://via.placeholder.com/300x220?text=Image+Non+Trouvée';">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-dark" style="font-size: 1rem;">
                            {{ $article->titre }}
                        </h5>

                        <p class="text-muted small flex-grow-1">
                            {{ \Illuminate\Support\Str::limit($article->contenu, 60) }}
                        </p>

                        <div class="mt-3">
                            <span class="text-decoration-line-through text-muted small me-2">
                                {{ number_format($article->prix, 2) }} DH
                            </span>
                            <span class="text-success fw-bold fs-5">
                                @php
                                    $nouveauPrix = $article->prix - ($article->prix * ($article->discount_percentage / 100));
                                @endphp
                                {{ number_format($nouveauPrix, 2) }} DH
                            </span>
                        </div>

                        <button class="btn btn-dark w-100 mt-3 rounded-pill py-2 fw-500">
                            Ajouter au panier
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="mb-3"><span style="font-size: 4rem;">📦</span></div>
                <h4 class="text-muted">Aucun produit en promotion pour le moment.</h4>
                <a href="{{ url('/collection') }}" class="btn btn-outline-success mt-3 rounded-pill">Voir toute la collection</a>
            </div>
        @endforelse
    </div>
</div>

<style>
    .hover-shadow { transition: all 0.3s ease; }
    .hover-shadow:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
</style>
@endsection