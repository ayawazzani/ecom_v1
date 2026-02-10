@extends('layout')

@section('title', 'Liste des Articles')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Gestion des Articles</h2>

    @if(session('successdelete'))
        <div class="alert alert-success">{{ session('successdelete') }}</div>
    @endif

    @if(session('successupdate'))
        <div class="alert alert-success">{{ session('successupdate') }}</div>
    @endif

    <a href="{{ route('articles.create') }}" class="btn btn-success mb-3">Ajouter un Article</a>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Titre</th>
                <th>Prix (MAD)</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>
                    @if($article->image)
                        <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset($article->image) }}" alt="image" style="width:80px; height:80px; object-fit:cover;">

                    @else
                        <span class="text-muted">Pas d'image</span>
                    @endif
                </td>
                <td>{{ $article->titre }}</td>
                <td>{{ $article->prix }}</td>
                <td>{{ $article->category->nom ?? '-' }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-muted">Aucun article disponible.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
