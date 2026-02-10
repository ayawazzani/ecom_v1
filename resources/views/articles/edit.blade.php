@extends('layout')

@section('title', 'Modifier Article')

@section('content')
<div class="container mt-5">
    <h2>Modifier l'article</h2>

    @if(session('successupdate'))
        <div class="alert alert-success">{{ session('successupdate') }}</div>
    @endif

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $article->titre }}">
            @error('titre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="contenu">Contenu</label>
            <textarea name="contenu" id="contenu" class="form-control" rows="4">{{ $article->contenu }}</textarea>
            @error('contenu')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="prix">Prix (MAD)</label>
            <input type="number" name="prix" id="prix" class="form-control" value="{{ $article->prix }}">
            @error('prix')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Catégorie</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="image">Image (laisser vide si inchangée)</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($article->image)
                <img src="{{ $article->image }}" alt="image" style="width:100px; margin-top:10px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
