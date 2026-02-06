@extends('layout')

@section('title', 'Contact - CompasSport')

@section('content')
<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold" style="color: #2d5a27;">Contactez-<span style="color: #4CAF50;">nous</span></h1>
        <p class="text-muted mx-auto" style="max-width: 600px;">
            Une question sur un équipement ? Une suggestion ? Notre équipe de passionnés est là pour vous répondre dans les plus brefs délais.
        </p>
    </div>

    <div class="row g-5">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100 p-4" style="border-radius: 20px; background-color: #f8fdf8;">
                <h3 class="h5 fw-bold mb-4" style="color: #2d5a27;">Nos Coordonnées</h3>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box me-3">
                        <i class="bi bi-envelope-fill text-white"></i>
                    </div>
                    <div>
                        <p class="mb-0 small text-muted">Email</p>
                        <p class="mb-0 fw-bold">contact@ecomv1.com</p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box me-3">
                        <i class="bi bi-telephone-fill text-white"></i>
                    </div>
                    <div>
                        <p class="mb-0 small text-muted">Téléphone</p>
                        <p class="mb-0 fw-bold">+212 6 00 00 00 00</p>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <div class="icon-box me-3">
                        <i class="bi bi-geo-alt-fill text-white"></i>
                    </div>
                    <div>
                        <p class="mb-0 small text-muted">Adresse</p>
                        <p class="mb-0 fw-bold">Casablanca, Maroc</p>
                    </div>
                </div>

                <hr class="my-4">
                <h4 class="h6 fw-bold mb-3">Suivez l'aventure</h4>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-success btn-sm rounded-circle"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-outline-success btn-sm rounded-circle"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-outline-success btn-sm rounded-circle"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 20px;">
                <h3 class="h4 fw-bold mb-4">Envoyez-nous un message</h3>
                <form action="#" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Nom Complet</label>
                            <input type="text" name="nom" class="form-control form-control-lg border-light bg-light" placeholder="Votre nom" style="border-radius: 12px; font-size: 1rem;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg border-light bg-light" placeholder="email@exemple.com" style="border-radius: 12px; font-size: 1rem;">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Message</label>
                            <textarea name="message" rows="5" class="form-control border-light bg-light" placeholder="Comment pouvons-nous vous aider ?" style="border-radius: 12px; font-size: 1rem;"></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-warning btn-lg px-5 text-white fw-bold shadow-sm" style="background-color: #ff9800; border: none; border-radius: 12px;">
                                <i class="bi bi-send-fill me-2"></i> Envoyer le message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .icon-box {
        width: 45px;
        height: 45px;
        background-color: #4CAF50;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        flex-shrink: 0;
    }
    .form-control:focus {
        background-color: #fff !important;
        border-color: #4CAF50 !important;
        box-shadow: 0 0 0 0.25 red border-color: rgba(76, 175, 80, 0.1) !important;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endsection