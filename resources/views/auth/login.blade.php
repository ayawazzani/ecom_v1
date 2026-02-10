@extends('layout')

@section('content')
<style>
    /* حاوية التوسيط الكامل */
    .full-height-container {
        min-height: 100vh;
        display: flex;
        align-items: center; /* توسيط عمودي */
        justify-content: center; /* توسيط أفقي */
        padding-top: 50px;
    }

    /* الكارط بنفس ستايل S'inscrire */
    .login-card {
        border: none;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        background-color: #fffaf5;
        width: 100%;
        max-width: 420px; /* أصغر قليلاً من التسجيل لأن الحقول أقل */
    }

    /* الهيدر الأخضر الغامق المميز */
    .card-header-custom {
        background-color: #1b4332;
        color: white;
        text-align: center;
        padding: 35px 20px;
    }

    .card-header-custom h2 { 
        font-weight: bold; 
        font-size: 1.8rem; 
        margin: 0; 
        font-family: 'serif', 'Times New Roman';
    }
    
    .card-header-custom p { 
        color: #ffb703; 
        letter-spacing: 2px; 
        font-size: 0.75rem; 
        margin-top: 5px; 
        text-transform: uppercase;
    }

    /* تنسيق المدخلات */
    .form-control {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 12px 15px;
    }

    .form-control:focus {
        border-color: #2E7D32;
        box-shadow: none;
        background-color: #fff;
    }

    /* زر الدخول */
    .btn-login-now {
        background-color: #1b4332;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 12px;
        width: 100%;
        font-weight: bold;
        transition: 0.3s;
        margin-top: 10px;
    }

    .btn-login-now:hover { 
        background-color: #2d6a4f; 
        color: white; 
        transform: translateY(-2px); 
    }

    .form-check-label { font-size: 0.85rem; color: #555; }
    .forgot-link { font-size: 0.85rem; color: #1b4332; text-decoration: none; }
</style>

<div class="full-height-container">
    <div class="card login-card">
        <div class="card-header-custom">
            <h2>Bon retour</h2>
            <p>SE CONNECTER</p>
        </div>

        <div class="card-body p-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">Adresse E-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="exemple@mail.com">
                    @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">Mot de passe</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="••••••••">
                    @error('password')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Souvenir de moi</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">Oublié ?</a>
                    @endif
                </div>

                <button type="submit" class="btn-login-now">
                    Se Connecter
                </button>

                <div class="text-center mt-4 small text-muted">
                    Pas encore de compte ? 
                    <a href="{{ route('register') }}" class="text-success fw-bold text-decoration-none">S'inscrire</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection