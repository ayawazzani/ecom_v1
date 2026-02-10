<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CompasSport')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            /* خلفية افتراضية هادئة */
            background-color: #f8f9fa; 
        }

        /* --- Navbar Style --- */
        .navbar { 
            background-color: #1b4332 !important; /* الأخضر الغامق المتناسق مع الهيدر */
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            padding: 12px 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.4rem;
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            margin: 0 5px;
            transition: 0.3s;
        }

        .nav-link:hover { color: #ffb703 !important; }

        /* ستايل API Client المميز */
        .nav-api-client {
            border: 1px solid rgba(255,183,3, 0.6);
            border-radius: 20px;
            padding: 5px 15px !important;
            color: #ffb703 !important;
        }
        
        .nav-api-client:hover {
            background: #ffb703;
            color: #1b4332 !important;
        }

        /* ستايل زر التسجيل البرتقالي */
        .btn-register {
            background-color: #FF9800 !important;
            color: white !important;
            border-radius: 20px;
            padding: 6px 20px !important;
            margin-left: 10px;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn-register:hover {
            background-color: #e68a00 !important;
            transform: translateY(-1px);
        }

        footer { 
            background: #1b4332; 
            color: white; 
            padding: 20px 0; 
            margin-top: 40px; 
            border-top: 3px solid #ffb703;
        }
        /* My Space Dropdown Style */
        .dropdown-menu { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); background-color: #fffaf5; }
        .dropdown-item { font-size: 0.9rem; padding: 10px 20px; transition: 0.2s; }
        .dropdown-item:hover { background-color: #1b4332; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.jpeg') }}" height="40" class="me-2 rounded shadow-sm"> 
            CompasSport
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/apropos') }}">À propos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/collection') }}">Collection</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                
                <li class="nav-item">
                    <a class="nav-link nav-api-client" href="https://react-client-six-omega.vercel.app" target="_blank">
                        API Client
                    </a>
                </li>
               @if(Auth::check())
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle fw-bold text-warning" href="#" id="mySpaceDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My Space
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="mySpaceDrop">
            <li><h6 class="dropdown-header text-dark">Salut, {{ Auth::user()->name }}</h6></li>
            
            {{-- التحقق من الـ Role الموجود في قاعدة البيانات --}}
            @if(Auth::user()->role === 'admin')
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-header fw-bold text-danger">ESPACE ADMIN</li>
                <li><a class="dropdown-item" href="{{ url('/admin/articles') }}">📋 Gestion des produits</a></li>
                <li><a class="dropdown-item" href="{{ url('/admin/add-article') }}">➕ Ajouter produit</a></li>
            @else
                {{-- إذا لم يكن أدمن، يظهر كـ User عادي --}}
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ url('/produits-solde') }}">🏷️ Produits en solde</a></li>
                <li><a class="dropdown-item" href="{{ url('/profile') }}">👤 Mon Profil</a></li>
            @endif

            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="px-3">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger w-100 rounded-pill">Déconnexion</button>
                </form>
            </li>
        </ul>
    </li>
@else
    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Se connecter</a></li>
    <li class="nav-item"><a class="nav-link btn-register" href="{{ route('register') }}">S'inscrire</a></li>
@endif

            </ul>
        </div>
    </div>
</nav>

<div class="main-content">
    @yield('content')
</div>

<footer class="text-center">
    <div class="container">
        <p class="mb-0">&copy; 2026 <strong>CompasSport</strong> - Tous droits réservés</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


