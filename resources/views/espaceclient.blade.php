@extends('layout')

@section('content')

<h2 class="mb-4">Produits en Solde</h2>

<div class="row">
    @foreach($articles as $article)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->titre }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->titre }}</h5>
                    <p class="card-text">{{ $article->prix }} MAD</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
