@extends('layout')

@section('content')
<div class="container my-5">
    <div class="card shadow border-0" style="border-radius: 20px;">
        <div class="card-header text-white text-center" style="background-color: #1b3a2e; border-radius: 20px 20px 0 0;">
            <h4 class="mb-0">Ajouter un Nouveau Produit</h4>
        </div>
        <div class="card-body p-4">
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="fw-bold">Nom du produit</label>
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}">
                    @error('titre') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Prix (MAD)</label>
                        <input type="number" name="prix" class="form-control" value="{{ old('prix') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Catégorie</label>
                        <select name="category_id" class="form-select">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Description</label>
                    <textarea name="contenu" class="form-control" rows="4">{{ old('contenu') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Image du produit</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn w-100 text-white fw-bold" style="background-color: #1b3a2e;">Enregistrer le produit</button>
            </form>
        </div>
    </div>
</div>
@endsection