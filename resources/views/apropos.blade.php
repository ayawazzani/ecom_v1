@extends('layout')

@section('title', 'À propos - CompasSport')

@section('content')
<div class="container my-5">
    <div class="row align-items-center mb-5 pb-4">
        <div class="col-md-6">
            <span class="badge rounded-pill bg-light text-success px-3 py-2 mb-3 shadow-sm border">L'aventure vous attend</span>
            <h1 class="display-4 fw-bold" style="color: #2d5a27;">À propos de <span style="color: #4CAF50;">CompasSport</span></h1>
            <p class="lead text-muted mt-3 shadow-none">
                Votre partenaire de confiance pour explorer les paysages magnifiques du Maroc et d'ailleurs. 
                <br><small class="text-secondary" style="font-size: 0.9rem;">Plus qu'une boutique, une communauté de passionnés.</small>
            </p>
        </div>
        <div class="col-md-6 text-center">
             <div class="position-relative">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-success opacity-10 rounded-4 rotate-3" style="transform: rotate(3deg); z-index: -1;"></div>
                <img src="{{ asset('images/companing.jpg') }}" class="img-fluid rounded-4 shadow" alt="Randonnée" style="max-height: 380px; width: 100%; object-fit: cover;">
             </div>
        </div>
    </div>

    <div class="row text-center g-4 mb-5 py-5 border-top border-bottom bg-light rounded-4">
        <div class="col-6 col-md-3">
            <h2 class="fw-bold mb-0" style="color: #2d5a27;">+500</h2>
            <p class="text-muted small">Articles Outdoor</p>
        </div>
        <div class="col-6 col-md-3">
            <h2 class="fw-bold mb-0" style="color: #2d5a27;">100%</h2>
            <p class="text-muted small">Qualité Testée</p>
        </div>
        <div class="col-6 col-md-3">
            <h2 class="fw-bold mb-0" style="color: #2d5a27;">24h/48h</h2>
            <p class="text-muted small">Livraison Rapide</p>
        </div>
        <div class="col-6 col-md-3">
            <h2 class="fw-bold mb-0" style="color: #2d5a27;">+2000</h2>
            <p class="text-muted small">Clients Heureux</p>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center about-card">
                <div class="icon-box mb-3 mx-auto shadow-sm">
                    <i class="bi bi-bullseye" style="font-size: 1.8rem; color: #fff;"></i>
                </div>
                <h3 class="h5 fw-bold mt-2">Notre Mission</h3>
                <p class="text-muted small mb-0">
                    Accompagner vos aventures les plus intenses avec du matériel sur lequel vous pouvez compter à 100%.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center about-card featured">
                <div class="icon-box mb-3 mx-auto shadow-sm">
                    <i class="bi bi-compass" style="font-size: 1.8rem; color: #fff;"></i>
                </div>
                <h3 class="h5 fw-bold mt-2">Notre Spécialité</h3>
                <p class="text-muted small mb-0">
                    Experts passionnés de randonnée et camping, nous sélectionnons le meilleur pour le terrain marocain.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 text-center about-card">
                <div class="icon-box mb-3 mx-auto shadow-sm">
                    <i class="bi bi-heart" style="font-size: 1.8rem; color: #fff;"></i>
                </div>
                <h3 class="h5 fw-bold mt-2">Nos Valeurs</h3>
                <p class="text-muted small mb-0">
                    Durabilité et respect de la nature sont au cœur de chaque produit que nous proposons.
                </p>
            </div>
        </div>
    </div>

    <div class="mt-5 p-5 text-center bg-dark text-white shadow-lg overflow-hidden position-relative" style="border-radius: 25px; background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1000&q=80'); background-size: cover; background-position: center;">
        <div class="position-relative" style="z-index: 2;">
            <h2 class="mb-4 display-6 fw-bold text-uppercase">Prêt pour votre prochaine aventure ?</h2>
            <p class="mb-4 opacity-75">Rejoignez des milliers d'explorateurs dès aujourd'hui.</p>
            <a href="/" class="btn btn-success btn-lg px-5 py-3 rounded-pill shadow-sm fw-bold border-0" style="background-color: #4CAF50;">Découvrir la collection</a>
        </div>
    </div>
</div>

<style>
    .about-card {
        border-radius: 20px !important;
        transition: transform 0.3s ease, shadow 0.3s ease;
    }
    .about-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .featured {
        background-color: #f8fdf8 !important;
        border: 1px solid #e1f0e1 !important;
    }
    .icon-box {
        width: 60px;
        height: 60px;
        background: #4CAF50;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endsection