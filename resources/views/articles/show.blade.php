@extends('layout')

@section('content')
<div class="container">
    <h2>{{ $article->titre }}</h2>
    <p>{{ $article->contenu }}</p>

    <a href="{{ route('articles.index') }}" class="btn btn-secondary">
        Retour à la liste des produits
    </a>
</div>
@endsection
