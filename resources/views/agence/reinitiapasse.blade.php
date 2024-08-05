<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>
    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</head>

<body class="app app-login p-0">

    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4 position-fixed fixed-top mb-5">
            <a href="{{route('home')}}" class="navbar-brand d-flex text-center">
                <div class="container d-flex align-items-center pt-2">
                    <img style="width:20%" src="{{ asset('assets/images/LOGO-SITE.png') }}">
                    <h1 class="my-auto text-primary ms-3">LocaPlace</h1>
                </div>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{route('home')}}"
                        class="nav-item nav-link  {{ Route::currentRouteNamed('home') ? 'active' : '' }}">Accueil</a>
                    <a href="{{route('about')}}"
                        class="nav-item nav-link {{ Route::currentRouteNamed('about') ? 'active' : '' }}">Nos
                        Services</a>
                    <a href="{{route('contact')}}"
                        class="nav-item nav-link {{ Route::currentRouteNamed('contact') ? 'active' : '' }}">Contact</a>
                </div>
                @guest
                <div class="btn-group">
                    <button type="button" class="btn app-btn-primary dropdown-toggle me-2 text-uppercase px-2"
                        data-bs-toggle="dropdown" aria-expanded="false">S'inscrire</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('AgenceRegister')}}">Propriétaires d'objet</a></li>
                        <li><a class="dropdown-item" href="{{route('LocataireRegister')}}">Locataire</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn app-btn-primary dropdown-toggle text-uppercase px-2"
                        data-bs-toggle="dropdown" aria-expanded="false">Se connecter</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('AgenceLogin')}}">Propriétaires d'objet</a></li>
                        <li><a class="dropdown-item" href="{{route('HandleLocataireLogin')}}">Locataire</a></li>
                        <li><a class="dropdown-item" href="{{route('HandleAdminLogin')}}">Administrateur</a></li>
                    </ul>
                </div>
                @endguest
            </div>
        </nav>
    </div>

    <div class="row g-0 app-auth-wrapper mt-5">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    @if(Session::get('success'))
                    <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::get('error'))
                    <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                    @endif
                    <div class="auth-form-container text-start mt-5">
                        <div class="auth-intro my-3 text-center">Veuillez entrer le code de réinitialisation envoyé à
                            votre adresse e-mail ci-dessous ainsi que votre nouveau mot de passe.</div>
                        <form method="POST" action="{{ route('SendMotdepasseReinitialiseAgence') }}"
                            class="auth-form login-form">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="email mb-3">
                                <label class="sr-only" for="code">Code de réinitialisation</label>
                                <input id="code" name="code" type="number" class="form-control signin-email"
                                    placeholder="Code de validation">
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Nouveau mot de passe</label>
                                <input id="signin-password" name="password" type="password"
                                    class="form-control signin-password" placeholder="Mot de passe">
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="password">Confirmer le mot de passe</label>
                                <input id="password" type="password" name="password_confirmation"
                                    class="form-control signin-password" placeholder="Confirmer mot de passe">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Réinitialiser
                                    le mot de passe</button>
                            </div>
                        </form>
                    </div>
                    <!--//auth-form-container-->

                </div>
                <!--//auth-body-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
            </div>
        </div>

    </div>

</body>

</html>
