@extends('pages.website')

@section('content')
    <!-- Header Start -->
    @include('pages.header')
    <!-- Header End -->

    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 text-uppercase gros_titre">Objets favoris</h1>
                <p class="mt-3">Voici une liste des objets les plus demandés de notre application</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light" href="{{ route('articles') }}">
                        <div class="description">
                            <img class="img-fluid icon mb-3" src="img/pots-row.jpg" alt="Icon" />
                            <h6>Matériels de restauration</h6>
                            <p>Agence ............</p>
                            <span>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                            </span>
                            <button class="btn button-default star">Voir plus d'objets<i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light" href="{{ route('articles') }}">
                        <div class="description">
                            <img class="img-fluid icon mb-3"
                                src="img/electric-mixer-knob-sliding-sound-engineer-adjusting-balance-generated-by-ai.jpg"
                                alt="Icon">
                            <h6>Table de mixage</h6>
                            <p>Agence ............</p>
                            <span>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star-half-alt star"></i>
                            </span>
                            <button class="px-2 btn button-default  star">Voir plus d'objets<i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light" href="{{ route('articles') }}">
                        <div class="description">
                            <img class="img-fluid icon mb-3" src="img/music-instrument-store.jpg" alt="Icon">
                            <h6>Instruments de musique</h6>
                            <p>Agence ............</p>
                            <span>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star-half-alt star"></i>
                                <i class="far fa-star star"></i>
                            </span>
                            <button class="px-2 btn button-default star">Voir plus d'objets<i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light" href="{{ route('articles') }}">
                        <div class="description">
                            <img class="img-fluid icon mb-3" src="img/two-record-players.jpg" alt="Icon">
                            <h6>Deux tourne-disque</h6>
                            <p>Agence ............</p>
                            <span>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                                <i class="far fa-star star"></i>
                                <i class="far fa-star star"></i>
                            </span>
                            <button class="px-2 btn button-default star">Voir plus d'objets<i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light" href="{{ route('articles') }}">
                        <div class="description">
                            <img class="img-fluid icon mb-3" src="img/plug-jack-amplifier.jpg" alt="Icon">
                            <h6>Jack et amplificateur</h6>
                            <p>Agence ............</p>
                            <span>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star-half-alt star"></i>
                                <i class="far fa-star star"></i>
                                <i class="far fa-star star"></i>
                            </span>
                            <button class="px-2 btn button-default star">Voir plus d'objets<i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light" href="{{ route('articles') }}">
                        <div class="description">
                            <img class="img-fluid icon mb-3" src="img/bar-concept.jpg" alt="Icon">
                            <h6>Appareils électroménagers</h6>
                            <p>Agence ............</p>
                            <span>
                                <i class="fa fa-star star"></i>
                                <i class="far fa-star star"></i>
                                <i class="far fa-star star"></i>
                                <i class="far fa-star star"></i>
                            </span>
                            <button class="px-2 btn button-default star">Voir plus d'objets<i
                                    class="fas fa-arrow-right"></i></button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100 h-100" src="img/black-boy-playing-guitar.jpg">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Trouver le matériel idéal</h1>
                    <p class="mb-4">L'idée première de cette application est de faciliter la tâche aux personnes
                        d'accéder librement à des matériels dont ils ont besoin et d'aider toute personne possédant un objet
                        qu'il n'utilise plus ou qu'il n'utilise que pour un besoin rare de passer par ce site et de le
                        mettre en valeur en le mettant en location</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Avoir une vue générale sur les objets
                        disponibles et leur niveau de populartité</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Louer des objets aussi proche que possible de
                        chez vous grâce à notre géolocalisation</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Consulter l'avis des utilisateurs et l'impact
                        positif de la location sur le secteur environnemental</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('about') }}">Lire plus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Object List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div>
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3 gros_titre text-center">Liste des objets disponibles</h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="{{ route('articles') }}"><img class="img-fluid"
                                            src="img/dispositif-melangeur-electronique-retro-brun.jpg" alt=""></a>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Appareil électroménager</div>
                                </div>
                                <div class="p-2 pb-0">
                                    <h5 class="text-primary mb-3">1500 FCFA</h5>
                                    <a class="d-block h5 mb-2" href="{{ route('articles') }}">Générateur de chauffage</a>
                                    <p><i class="fa fa-map-marker-alt text-primary m-0"></i>
                                        8JRG+F93,Parakou,Carrefour 3 banques</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-project-diagram text-primary me-2"></i>100 modèles</small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-bed text-primary me-2"></i>105% de rendement</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="{{ route('articles') }}"><img class="img-fluid" src="img/pots-row.jpg"
                                            alt=""></a>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Matériels de restauration</div>
                                </div>
                                <div class="p-2 pb-0">
                                    <h5 class="text-primary mb-3">3000 FCFA</h5>
                                    <a class="d-block h5 mb-2" href="{{ route('articles') }}">Equipements de prsentation
                                        et de
                                        services</a>
                                    <p><i class="fa fa-map-marker-alt text-primary m-0"></i> 8JFF+9CF, Parakou,
                                        carrefour 3AS</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-concierge-bell text-primary me-2"></i>50 plateaux</small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-utensils text-primary me-2"></i>700 assiettes</small>
                                    <small class="flex-fill text-center py-2"><i
                                            class="fas fa-glass-martini text-primary me-2"></i>500 verres...</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="{{ route('articles') }}"><img class="img-fluid"
                                            src="img/two-record-players.jpg" alt=""></a>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Objets DJ</div>
                                </div>
                                <div class="p-2 pb-0">
                                    <h5 class="text-primary mb-3">5000 FCFA</h5>
                                    <a class="d-block h5 mb-2" href="{{ route('articles') }}">Double tourne-disque</a>
                                    <p><i class="fa fa-map-marker-alt text-primary m-0"></i> 9J59+34F, Parakou,
                                        Wansirou</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-project-diagram text-primary me-2"></i>4 modèles</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="{{ route('articles') }}"><img class="img-fluid"
                                            src="img/3d-view-musical-instrument.jpg" alt=""></a>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Instrument de musique</div>
                                </div>
                                <div class="p-2 pb-0">
                                    <h5 class="text-primary mb-3">2000 FCFA</h5>
                                    <a class="d-block h5 mb-2" href="{{ route('articles') }}">Des instruments à vent</a>
                                    <p><i class="fa fa-map-marker-alt text-primary m-0"></i> 9J4C+G3F, Parakou,
                                        Okedama
                                    </p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-music text-primary me-2"></i>10 trompettes</small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-music text-primary me-2"></i>5 trombones</small>
                                    <small class="flex-fill text-center py-2"><i
                                            class="fas fa-music text-primary me-2"></i>3 saxophones</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="{{ route('articles') }}"><img class="img-fluid"
                                            src="img/electric-mixer-knob-sliding-sound-engineer-adjusting-balance-generated-by-ai.jpg"
                                            alt=""></a>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Appareil de sonorisation</div>
                                </div>
                                <div class="p-2 pb-0">
                                    <h5 class="text-primary mb-3">5000 FCFA</h5>
                                    <a class="d-block h5 mb-2" href="{{ route('articles') }}">Table de mixage</a>
                                    <p><i class="fa fa-map-marker-alt text-primary m-0"></i> 9J2X+8FW, RNIE6, Parakou,
                                        Marché de Nima</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-project-diagram text-primary me-2"></i>3 modèles</small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-thermometer-half text-primary me-2"></i>Alimentation fantôme
                                        48V</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <a href="{{ route('articles') }}"><img class="img-fluid" src="img/bar-concept.jpg"
                                            alt=""></a>
                                    <div
                                        class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                        Appareil électroménager
                                    </div>
                                </div>
                                <div class="p-2 pb-0">
                                    <h5 class="text-primary mb-3">3500 FCFA</h5>
                                    <a class="d-block h5 mb-2" href="{{ route('articles') }}">Ensemble d'appareil</a>
                                    <p><i class="fa fa-map-marker-alt text-primary m-0"></i> 8JFV+G9 Parakou, Marché rose
                                        croix</p>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-project-diagram text-primary me-2"></i>5
                                        modèles</small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fas fa-thermometer-half text-primary me-2"></i>Très économique</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="{{ route('articles') }}">Voir plus d'objets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Object List End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded w-100 h-100"
                                src="img/afro-american-student-working-from-home-using-laptop-kitchen.jpg" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="mb-4 paragraphe_contact">
                                <h1 class="mb-3">Contacter notre agent certifié</h1>
                                <p class="p">Nous serions ravis de vous entendre ! Que vous ayez des questions sur nos
                                    services, des
                                    suggestions ou que vous souhaitiez simplement en savoir plus sur nous, n'hésitez pas à
                                    nous contacter. Notre équipe est disponible pour vous aider et répondre à toutes vos
                                    préoccupations. Nous vous répondrons dans les plus brefs délais.</p>
                            </div>
                            <a href="" class="btn btn-primary py-3 px-4 me-2"><i
                                    class="fa fa-phone-alt me-2"></i>Faire un
                                appel</a>
                            <a href="" class="btn btn-dark py-3 px-4"><i
                                    class="fa fa-calendar-alt me-2"></i>Prendre un
                                Rdv</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Team Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-3 gros_titre">Propriétaire d'objets</h1>
                <p> Nous travaillons en étroite collaboration avec des propriétaires de confiance qui mettent à disposition
                    une variété d'objets pour la location. Que ce soit des appareils électroménagers, des instruments de
                    musique, du matériel de restauration ou des équipements de sonorisation, nos propriétaires s'engagent à
                    offrir des articles de haute qualité, parfaitement entretenus et prêts à être utilisés. Faites confiance
                    à notre réseau pour trouver exactement ce dont vous
                    avez besoin, quand vous en avez besoin.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid img_team w-100" src="img/team-1.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1"
                                    href="https://www.facebook.com/profile.php?id=100084037883528"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href="https://x.com/AkpovoNica10"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href="https://www.instagram.com/nicaakpovo/"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">AMOUSSOU Bruno</h5>
                            <small>Propriétaire d'objet</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid img_team w-100" src="img/team-2.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1"
                                    href="https://www.facebook.com/profile.php?id=100082512480014"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href="https://www.instagram.com/lucacio10/"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">NOUGBONON Sergio</h5>
                            <small>Agent de location</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid img_team" src="img/team-3.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href="https://www.instagram.com/azifathmoussa/"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">ATROKPO Rayanath</h5>
                            <small>Agent de location</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid img_team" src="img/team-4.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href="https://www.instagram.com/la.dy_boss229/"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">DOUGBELO Rafiathou</h5>
                            <small>Propriétaire d'objet</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-3 gros_titre">Nos clients en parlent!</h1>
                <p>Nous sommes fiers de partager les témoignages et les avis de ceux qui ont utilisé nos services. Leurs
                    retours authentiques reflètent la qualité des objets proposés et la fiabilité de notre plateforme.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p class="p">"J'ai loué un appareil électroménager via ce site et je suis extrêmement
                            satisfaite du service.
                            Le processus de location était simple et rapide, et l'appareil était en parfait état. Je
                            recommande vivement cette plateforme à tous ceux qui ont besoin de louer des équipements de
                            qualité."</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Modeste BARI</h6>
                                <small>Professeur </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p class="p">"En tant que musicien, j'avais besoin de louer un saxophone pour un concert
                            important. Grâce à ce
                            site, j'ai pu trouver un instrument de haute qualité à un prix abordable. Le propriétaire était
                            très professionnel et sympathique. Je reviendrai certainement pour mes futurs besoins en
                            location.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">MONTO Ahmed</h6>
                                <small>Artiste musicien</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p class="p">"Nous avons loué du matériel de restauration pour notre événement familial, et
                            tout s'est déroulé
                            sans accroc. Le matériel était impeccable et a contribué au succès de notre fête. Merci à ce
                            site pour cette excellente expérience. Je recommande leurs services sans hésitation !"</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">BOSSOUDE Roukayath</h6>
                                <small>Restauratrice</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p class="p">"J'avais besoin d'un appareil de sonorisation pour une conférence et j'ai trouvé
                            exactement ce
                            qu'il me fallait sur ce site. Le processus de réservation était très facile, et l'équipement
                            était prêt à l'heure et fonctionnait parfaitement. Un service de location fiable et efficace."
                        </p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">BIO DAGUI Oubéïrou</h6>
                                <small>Artiste musicien</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
