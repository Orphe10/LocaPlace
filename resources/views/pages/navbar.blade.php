<!-- Spinner Start -->
{{-- <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div> --}}
<!-- Spinner End -->

<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4 position-fixed fixed-top">
        <a href="{{route('home')}}" class="navbar-brand d-flex  text-center">
            <div class="icon1 p-2">
                <img style="width:150%" src="{{ asset('assets/images/LOGO-SITE.png') }}">
            </div>
            <div class="container">
                <h1 class="pt-2 my-auto text-primary">LocaPlace</h1>
            </div>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{route('home')}}"
                    class="nav-item nav-link {{ Route::currentRouteNamed('home') ? 'active' : '' }}">Accueil</a>
                <a href="{{route('about')}}"
                    class="nav-item nav-link {{ Route::currentRouteNamed('about') ? 'active' : '' }}">Nos Services</a>
                <a href="{{route('contact')}}"
                    class="nav-item nav-link {{ Route::currentRouteNamed('contact') ? 'active' : '' }}">Contact</a>
            </div>
            @guest
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle me-2 text-uppercase px-2"
                    data-bs-toggle="dropdown" aria-expanded="false">S'inscrire</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('AgenceRegister')}}">Propriétaires d'objet</a></li>
                    <li><a class="dropdown-item" href="{{route('LocataireRegister')}}">Locataire</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle text-uppercase px-2"
                    data-bs-toggle="dropdown" aria-expanded="false">Se connecter</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('AgenceLogin')}}">Propriétaires d'objet</a></li>
                    <li><a class="dropdown-item" href="{{route('HandleLocataireLogin')}}">Locataire</a></li>
                    <li><a class="dropdown-item" href="{{route('HandleAdminLogin')}}">Administrateur</a></li>
                </ul>
            </div>
            @endguest
            @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user-circle fa-2x mx-2"></i>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile.show') }}">
                        Mon Profil
                    </a>
                    <a class="dropdown-item" href="{{route('LocataireLogout')}}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Se déconnecter
                    </a>
                    <form id="logout-form" action="{{ route('LocataireLogout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endauth
        </div>
    </nav>
</div>
<style>
    .dropdown-item:hover,
    .dropdown-item:focus {
        color: black;
        background-color: rgb(197, 184, 184);
    }

    .dropdown-item.active,
    .dropdown-item:active {
        color: white;
        text-decoration: none;
        background-color: blue;
    }

    .dropdown-item.disabled,
    .dropdown-item:disabled {
        color: white;
        pointer-events: none;
        background-color: transparent;
    }

    .dropdown-toggle:active,
    .dropdown-toggle:focus {
        border: blue;
    }

    .nav-link img {
        border: 2px solid #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        vertical-align: middle;
    }

    .nav-link span {
        vertical-align: middle;
    }

    .nav-item::marker {
        content: none;
    }

    .nav-link {
        color: blue;
    }

    .nav-link:hover {
        color: blue;
    }
</style>
</style>
<!-- Navbar End -->
