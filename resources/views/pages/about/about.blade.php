@extends('pages.website')

@section('content')



    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center mt-4">
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
                        mettre en valeur en le mettant en location. Que vous soyez à la recherche d'appareils
                        électroménagers, d'instruments de musique, de matériels de restauration ou d'appareils de
                        sonorisation, ou plein d'autres objets, nous avons ce qu'il vous faut.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Avoir une vue générale sur les objets
                        disponibles et leur niveau de populartité</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Louer des objets aussi proche que possible de
                        chez vous grâce à notre géolocalisation</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Consulter l'avis des utilisateurs et l'impact
                        positif de la location sur le secteur environnemental</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Économie et Écologie : Louer plutôt qu'acheter est une
                        excellente manière de réduire les coûts et de minimiser l'impact environnemental.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Facilité d'Utilisation : Notre plateforme est conçue
                        pour être intuitive et facile à utiliser, vous permettant de trouver et de louer des objets en
                        quelques clics.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Sécurité et Confiance : Nous mettons un point d'honneur
                        à sécuriser vos transactions et à vous offrir un service client réactif et fiable.</p>
                    <a class="btn btn-primary py-3 px-5 mt-3 offre">Nos offres <i class="fas fa-chevron-down"
                            id="chevron-icon"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl" id="offre" style="display:none ">
        <div class="container">
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col" class="fs-5 text-center col">Propriétaire d'objets</th>
                            <th scope="col" class="fs-5 text-center col">Locataire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <ul>
                                    <li>Les propriétaires d'objet incluent ici les agences de location et les particuliers
                                        qui possèdent des objets qu'ils veulent mettre en location</li>
                                    <li>D'entrée ce site est complètement gratuit pour tous les propriétaires d'objets</li>
                                    <li>Nous offrons un<a
                                            style="color: blue; cursor: pointer; text-decoration: underline solid;"
                                            class="openpopup" href="#pricing-item"> plan tarifaire</a> pour une
                                        utilisation après un mois et demi afin que
                                        les services puissent être payant</li>
                                    <li>Le service payant nous permettra de dégager des revenus à travers notre application
                                    </li>
                                    <li>Notre plateforme assure la liaison avec les locataires en leur offrant les articles
                                        mis en location par les propriétaires</li>
                                    <li>Nous assurons la sécurité dans la location en demandant dans nos formulaires
                                        quelques informations sur vous afin de nous assurer que vous êtes ce que vous
                                        prétendez être</li>
                                    <li>Les propriétaires ont la possibilité sur notre site de déposer des articles, de les
                                        modifier et de les supprimer</li>
                                    <li>Accès à un dashboard permettant de consulter ses articles, avec la possibilité
                                        d'avoir la liste de ces clients et d'autres statistiques sur ses objets</li>
                                    <li>Nous ne garantissons en aucun cas le retour des objets en bon état avec les
                                        locataires</li>
                                </ul>
                                @guest
                                <a class="btn btn-primary consentement px-2 " href="{{ route('AgenceRegister') }}">J'y
                                consens</a>
                                @endguest
                                <span><a style="color: white; cursor: pointer;" class="openpopup btn btn-primary"
                                        href="#pricing-item"> Plan tarifaire</a></span>
                            </td>
                            <td>
                                <ul>
                                    <li>Possibilité s'inscire sur le site de manière authentique en remplissant un
                                        formulaire</li>
                                    <li>Pour la sécurité, les locataires doivent accepter à notre application la
                                        localisation </li>
                                    <li>Les locataires ont la possibilité de choisir les objets de leur choix</li>
                                    <li>Nous offrons la possibilité aux utilisateurs d'obtenir les informations sur les
                                        propriétaires d'objet présent sur le site et possédant des objets de leur besoin
                                    </li>
                                    <li>Nous garantissons la sécurité de la location en authentifiant les propriétaires
                                        d'objet avant qu'ils ne puissent faire quoique ce soit sur le site</li>
                                    <li>La réservation d'objet pour un usage ultérieure est possible pour toute personne
                                        désireuse.</li>
                                    <li>Les locataires ont la possibilité de payer les frais de location en ligne</li>
                                    <li>En cas de réservation l'utilisateur est tenu de payer la moitié de la somme de
                                        location et l'autre moitié sera payé le jour de la location</li>
                                    <li>Au paiement, des frais forfaitaires supplémentaires sont prélevés</li>
                                    <li>Il est délivré un reçu pour le locataire en guise de preuve de paiement afin
                                        qu'aucune fraude n'est lieu</li>

                                </ul>
                                @guest
                                    <a class="btn btn-primary consentement px-2" href="{{ route('LocataireRegister') }}">J'y
                                        consens</a>
                                @endguest
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- About End -->
    <div id="popup-overlay0">
        <div class="popup-content">
            <a href="javascript:void(0)" onclick="closepopup0()" class="popup-exit">X</a>
            <!-- Contenu du popup -->
            <section id="pricing" class="pricing" style="display: none">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="pricing-item" id="pricing-item">
                                <h3>Plan tarifaire gratuit</h3>
                                <h4><sup>FCFA</sup>0<span> 1+0.5 mois</span></h4>
                                <ul>
                                    <li><i class="bi bi-check"></i>Accès gratuit à tous les services</li>
                                    <li><i class="bi bi-check"></i>Dépôt gratuit des objets sur le site</li>
                                    <li><i class="bi bi-check"></i>Suppression des objets non disponible</li>
                                </ul>
                                <a href="{{ route('AgenceRegister') }}" class="buy-btn" id="buy btn">Commencez
                                    maintenant</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="pricing-item">
                                <h3>Plan tarifaire payant</h3>
                                <h4><sup>FCFA</sup>3000<span> /mois</span></h4>
                                <ul>
                                    <li><i class="bi bi-check"></i>Accès à tous les services</li>
                                    <li><i class="bi bi-check"></i>Dépôt des objets sur le site</li>
                                    <li><i class="bi bi-check"></i>Suppression des objets non disponible</li>
                                </ul>
                                <a href="{{ route('AgenceRegister') }}" class="buy-btn">Commencez maintenant</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="pricing-item">
                                <h3>Plan tarifaire payant</h4>
                                    <h4><sup>FCFA</sup>30000<span> /an</span></h4>
                                    <ul>
                                        <li><i class="bi bi-check"></i>Une réduction de 500f chaque mois</li>
                                        <li><i class="bi bi-check"></i>Accès à tous les services</li>
                                        <li><i class="bi bi-check"></i>Dépôt des objets sur le site</li>
                                        <li><i class="bi bi-check"></i>Suppression des objets non disponible</li>
                                    </ul>
                                    <a href="{{ route('AgenceRegister') }}" class="buy-btn">Commencez maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Bootstrap Modal Structure -->
    <!--<div id="popup-overlay0" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content popup-content">
            <div class="modal-header">
              <h5 class="modal-title" id="popupModalLabel">Pricing Plans</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <section id="pricing" class="pricing">
                <div class="container">
                  <div class="row gy-4">
                    <div class="col-lg-4">
                      <div class="pricing-item">
                        <h3>Plan tarifaire gratuit</h3>
                        <h4><sup>FCFA</sup>0<span> 1+0.5 mois</span></h4>
                        <ul>
                          <li><i class="bi bi-check"></i>Accès gratuit à tous les services</li>
                          <li><i class="bi bi-check"></i>Dépôt gratuit des objets sur le site</li>
                          <li><i class="bi bi-check"></i>Suppression des objets non disponible</li>
                        </ul>
                        <a href="{{ route('AgenceRegister') }}" class="buy-btn">Commencez maintenant</a>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="pricing-item">
                        <h3>Plan tarifaire payant</h3>
                        <h4><sup>FCFA</sup>3000<span> /mois</span></h4>
                        <ul>
                          <li><i class="bi bi-check"></i>Accès à tous les services</li>
                          <li><i class="bi bi-check"></i>Dépôt des objets sur le site</li>
                          <li><i class="bi bi-check"></i>Suppression des objets non disponible</li>
                        </ul>
                        <a href="{{ route('AgenceRegister') }}" class="buy-btn">Commencez maintenant</a>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="pricing-item">
                        <h3>Plan tarifaire payant</h4>
                        <h4><sup>FCFA</sup>30000<span> /an</span></h4>
                        <ul>
                          <li><i class="bi bi-check"></i>Une réduction de 500f chaque mois</li>
                          <li><i class="bi bi-check"></i>Accès à tous les services</li>
                          <li><i class="bi bi-check"></i>Dépôt des objets sur le site</li>
                          <li><i class="bi bi-check"></i>Suppression des objets non disponible</li>
                        </ul>
                        <a href="{{ route('AgenceRegister') }}" class="buy-btn">Commencez maintenant</a>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>-->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-3 gros_titre">Propriétaire d'objets</h1>
                <p> Nous travaillons en étroite collaboration avec des propriétaires de confiance qui mettent à
                    disposition
                    une variété d'objets pour la location. Que ce soit des appareils électroménagers, des instruments de
                    musique, du matériel de restauration ou des équipements de sonorisation, nos propriétaires
                    s'engagent à
                    offrir des articles de haute qualité, parfaitement entretenus et prêts à être utilisés. Faites
                    confiance
                    à notre réseau pour trouver exactement ce dont vous
                    avez besoin, quand vous en avez besoin.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid img_team w-100" src="img/team-1.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
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
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
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
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
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
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
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
    </div>
    <!-- Team End -->

    <style>
        .col {
            width: 50%;
        }

        /**Plan tarifaire**/
        .pricing .pricing-item {
            padding: 60px 40px;
            box-shadow: 0 3px 20px -2px rgba(108, 117, 125, 0.15);
            background: #fff;
            height: 91%;
            border-top: 4px solid #fff;
            border-radius: 5px;
        }

        .pricing h3 {
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 20px;
            color: #0e1d34;
        }

        .pricing h4 {
            font-size: 48px;
            color: blue;
            font-weight: 400;
            font-family: "Inter", sans-serif;
            margin-bottom: 25px;
        }

        .pricing h4 sup {
            font-size: 28px;
        }

        .pricing h4 span {
            color: rgba(108, 117, 125, 0.8);
            font-size: 18px;
        }

        .pricing ul {
            padding: 20px 0;
            list-style: none;
            color: #6c757d;
            text-align: left;
            line-height: 20px;
        }

        .pricing ul li {
            padding: 10px 0;
            display: flex;
            align-items: center;
        }

        .pricing ul i {
            color: #059652;
            font-size: 24px;
            padding-right: 3px;
        }

        .pricing ul .na {
            color: rgba(108, 117, 125, 0.5);
        }

        .pricing ul .na i {
            color: rgba(108, 117, 125, 0.5);
        }

        .pricing ul .na span {
            text-decoration: line-through;
        }

        .pricing .buy-btn {
            display: inline-block;
            padding: 12px 35px;
            border-radius: 4px;
            color: blue;
            transition: none;
            font-size: 16px;
            font-weight: 500;
            font-family: "Inter", sans-serif;
            transition: 0.3s;
            border: 1px solid blue;
        }

        .pricing .buy-btn:hover {
            background: blue;
            color: #fff;
        }

        .pricing .featured {
            border-top-color: blue;
        }

        .pricing .featured .buy-btn {
            background: blue;
            color: #fff;
        }

        @media (max-width: 992px) {
            .pricing .box {
                max-width: 60%;
                margin: 0 auto 30px auto;
            }
        }

        @media (max-width: 767px) {
            .pricing .box {
                max-width: 80%;
                margin: 0 auto 30px auto;
            }
        }

        @media (max-width: 420px) {
            .pricing .box {
                max-width: 100%;
                margin: 0 auto 30px auto;
            }
        }
    </style>
    <script>
        function openpopup0() {
            let popup = document.querySelector("#popup-overlay0");
            popup.classList.toggle("open");
        }
    </script>
@stop
