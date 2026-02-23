@extends('layout')

@section('title', 'Votre Panier - CompasSport')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">Votre Panier</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix (MAD)</th>
                    <th>Quantité</th>
                    <th>Sous-total (MAD)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                @foreach(session('cart') as $id => $produit)
                    @php $subtotal = $produit['price'] * $produit['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($produit['photo']) }}" alt="{{ $produit['name'] }}" width="60" class="me-3">
                                <span>{{ $produit['name'] }}</span>
                            </div>
                        </td>
                        <td>{{ $produit['price'] }}</td>
                        <td>
                            <form action="{{ route('update.cart') }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number" name="quantity" value="{{ $produit['quantity'] }}" min="1" class="form-control me-2" style="width:80px;">
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-sm btn-primary">Modifier</button>
                            </form>
                        </td>
                        <td>{{ $subtotal }}</td>
                        <td>
                            <form action="{{ route('remove.from.cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total:</th>
                    <th>{{ $total }} MAD</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

        <div class="text-end mt-4">
            <a href="#" class="btn btn-success btn-lg">Passer au paiement</a>
        </div>
    @else
        <p>Votre panier est vide.</p>
        <a href="{{ route('collection.index') }}" class="btn btn-primary mt-3">Retour à la collection</a>
    @endif
</div>
@endsection