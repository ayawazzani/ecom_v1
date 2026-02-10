@extends('layout')

@section('content')
<style>
    /* حاوية التوسيط الكامل */
    .full-height-container {
        min-height: 100vh;
        display: flex;
        align-items: center; /* توسيط عمودي */
        justify-content: center; /* توسيط أفقي */
        padding-top: 50px; /* مساحة للنافبار */
        padding-bottom: 40px;
    }

    /* الكارط بنفس ستايل Se connecter */
    .register-card {
        border: none;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        background-color: #fffaf5;
        width: 100%;
        max-width: 500px; /* عرض أكبر قليلاً لاستيعاب حقول كلمة السر المتجاورة */
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

    /* زر التسجيل بنفس ستايل زر الدخول */
    .btn-register-now {
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

    .btn-register-now:hover { 
        background-color: #2d6a4f; 
        color: white; 
        transform: translateY(-2px); 
    }

    .login-link { font-size: 0.85rem; color: #555; }
</style>

<div class="full-height-container">
    <div class="card register-card">
        <div class="card-header-custom">
            <h2>Rejoignez-nous</h2>
            <p>CRÉER UN COMPTE</p>
        </div>

        <div class="card-body p-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">Nom complet</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Votre nom">
                    @error('name')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">Adresse E-mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="exemple@mail.com">
                    @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold text-muted">Mot de passe</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="••••••••">
                        @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold text-muted">Confirmation</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="btn-register-now">
                    S'inscrire Maintenant
                </button>

                <div class="text-center mt-4 small text-muted">
                    Déjà membre ? 
                    <a href="{{ route('login') }}" class="text-success fw-bold text-decoration-none">Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection