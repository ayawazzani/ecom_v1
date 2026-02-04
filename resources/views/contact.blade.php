@extends('layout')

@section('title', 'Contact - CompasSport')

@section('content')
<div class="my-5">
    <h1>Contactez-nous</h1>
    <p>N’hésitez pas à nous contacter pour toute question, suggestion ou demande d’information. Notre équipe est à votre écoute.</p>

    <ul>
        <li><strong>Email :</strong> contact@ecomv1.com</li>
        <li><strong>Téléphone :</strong> +212 6 00 00 00 00</li>
        <li><strong>Adresse :</strong> Maroc</li>
    </ul>

    <h2>Envoyez-nous un message</h2>
    <form action="#" method="post">
        <input type="text" name="nom" placeholder="Nom" class="form-control mb-2">
        <input type="email" name="email" placeholder="Email" class="form-control mb-2">
        <textarea name="message" placeholder="Message" class="form-control mb-2"></textarea>
        <button type="submit" class="btn btn-orange">Envoyer</button>
    </form>
</div>
@endsection
