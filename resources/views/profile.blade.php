@extends('layout')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card border-0 shadow-lg p-4" style="max-width: 450px; width: 100%; border-radius: 25px; background-color: #fffaf5;">
        <div class="text-center mb-4">
            <div class="bg-success d-inline-block rounded-circle p-3 mb-2 shadow-sm">
                <h1 class="m-0">👤</h1>
            </div>
            <h4 class="fw-bold">Mon Profil</h4>
        </div>
        <div class="p-3 bg-white shadow-sm rounded-4">
            <p class="mb-1 text-muted small">Nom complet</p>
            <h6 class="fw-bold border-bottom pb-2">{{ Auth::user()->name }}</h6>
            
            <p class="mb-1 mt-3 text-muted small">Adresse Email</p>
            <h6 class="fw-bold border-bottom pb-2">{{ Auth::user()->email }}</h6>
            
            <p class="mb-1 mt-3 text-muted small">Type de compte</p>
            {{-- عرض الـ Role بشكل ملون --}}
            @if(Auth::user()->role === 'admin')
                <span class="badge bg-danger px-3 py-2 rounded-pill">Administrateur</span>
            @else
                <span class="badge bg-primary px-3 py-2 rounded-pill">Client (User)</span>
            @endif
        </div>
    </div>
</div>
@endsection