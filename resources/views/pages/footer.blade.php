<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn w-100" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Entrer en contact</h5>
                <p class="mb-2 text-white"><i class="fa fa-map-marker-alt me-3"></i>9J2P+8Q Parakou</p>
                <p class="mb-2 text-white"><i class="fa fa-phone-alt me-3"></i>+229 66 89 65 12</p>
                <p class="mb-2 text-white"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Liens rapides</h5>
                <a class="btn btn-link text-white-50" href="{{route('about')}}">A Propos</a>
                <a class="btn btn-link text-white-50" href="{{route('contact')}}">Contactez-nous</a>
                <a class="btn btn-link text-white-50" href="{{route('about')}}">Nos services</a>
                <a class="btn btn-link text-white-50" href="{{route('about')}}">Politique de confidentialité</a>
                <a class="btn btn-link text-white-50" href="{{route('about')}}">Termes & conditions d'usage</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Galerie de photos</h5>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('img/dispositif-melangeur-electronique-retro-brun.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('img/pots-row.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('img/two-record-players.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('img/3d-view-musical-instrument.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('img/electric-mixer-knob-sliding-sound-engineer-adjusting-balance-generated-by-ai.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('img/bar-concept.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Parakou, la cité des koubourou</h5>
                <div class="position-relative mx-auto" style="width :100%">
                    <img style="width: 50%; height: 50%" src="img/Parakou-la-cité-des-Kobourou-Visiter-le-Bénin-01.jpg"/>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{route('home')}}">Location</a>, Tous droits réservés.

                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{route('home')}}">Accueil</a>
                        <a href="{{route('aide')}}">Aide</a>
                        <a href="{{route('aide')}}">FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
