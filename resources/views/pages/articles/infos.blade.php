@extends('pages.website')


@section('content')

<section class="objet-single nav-arrow-b">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 img">
                <img src="{{ asset('storage/' . $article->path) }}" class="img-fluid " />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="row justify-content-between">
                    <div class="col-md-5 col-lg-4">
                        <div class="property-price d-flex justify-content-center foo">
                            <div class="card-header-c d-flex">
                                <div class="card-box-ico">
                                    <span class="bi bi-cash">FCFA
                                    </span>
                                </div>
                                <div class="card-title-c align-self-center">
                                    <h5 class="title-c">{{$article->price}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 section-md-t3">
                        <div class="objet-summary">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d section-t4">
                                        <h3 class="title-d">Caractéristiques</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-list">
                                <ul class="list">
                                    <li class="d-flex justify-content-between">
                                        <strong>Libelle :</strong>
                                        <span>{{$article->libelle}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Catégorie :</strong>
                                        <span>{{$article->type}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Prix :</strong>
                                        <span>{{$article->price}} FCFA</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Statut :</strong>
                                        <span>
                                            @if ($article->statut == 'louer')
                                            Rupture de stock
                                            @elseif ($article->statut == 'reserver')
                                            Réservé
                                            @else
                                            Disponible
                                            @endif
                                        </span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Quantité :</strong>
                                        <span>{{$article->qte}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Disponible de :</strong>
                                        <span>{{$article->available_from}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Disponible jusqu'à : </strong>
                                        <span>{{$article->available_until}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Caractéristiques générales:</strong>
                                        <span>{{$article->description}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1 mt-4">
                <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary px-2" id="pills-map-tab" data-bs-toggle="pill"
                            href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false"
                            style="color: white;">Localisation</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3936.801176667191!2d2.634318174397003!3d9.350854983869155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbj!4v1718311697732!5m2!1sfr!2sbj"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row section-t3 mt-4">
                    <div class="col-sm-12">
                        <div class="title-box-d">
                            <h3 class="title-d">Contact Propriétaire</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(Session::get('success'))
                    <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::get('error'))
                    <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                    @endif
                    <div class="col-md-6 col-lg-4">
                        <img src="{{ asset('storage/' . $article->agence->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="property-agent">
                            <h4 class="title-agent">{{$article->agence->name}}</h4>
                            <p class="color-text-a">

                            </p>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between">
                                    <strong>Téléphone:</strong>
                                    <span class="color-text-a">{{$article->agence->num}}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <strong>Email:</strong>
                                    <span class="color-text-a">{{$article->agence->email}}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <strong>Skype:</strong>
                                    <span class="color-text-a">{{$article->agence->name}}.ge</span>
                                </li>
                            </ul>
                            <div class="socials-a">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="bi bi-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="bi bi-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="bi bi-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="property-contact">
                            <form id="messageForm" method="POST" action="{{ route('envoyer.message') }}" class="form-a">
                                @method('post')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a"
                                                name="nom" id="inputName" placeholder="Nom">
                                            @error('nom')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg form-control-a"
                                                name="email" id="inputEmail1" placeholder="Email">
                                            @error('email')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <textarea id="textMessage" class="form-control" placeholder="Commenter"
                                                name="message" cols="45" rows="4"></textarea>
                                            @error('message')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <button type="submit" class="btn btn-primary  w-100">Envoyer Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>


<style>
    .img img {
        width: 100%;
        height: 100%;
    }

    .property-price {
        margin: 0 auto;
    }

    .property-price .card-header-c {
        padding: 0;
    }

    .card-box-ico {
        padding: 1rem 3rem 1rem 2.5rem;
        border: 5px solid #2eca6a;
    }

    .card-box-ico span {
        font-size: 4rem;
        color: #000000;
    }

    .title-c {
        font-size: 2.5rem;
        font-weight: 600;
        margin-left: -40px;
    }

    .title-d {
        margin-left: 25px;
        text-decoration: underline solid;
        text-underline-position: 3px;
    }

    @media (min-width: 768px) {
        .title-c {
            font-size: 1.8rem;
        }
    }

    @media (min-width: 992px) {
        .title-c {
            font-size: 2.5rem;
        }
    }

    .objet-single {
        margin-top: 80px;
    }

    #pills-map iframe {
        width: 100%;
    }
</style>


@stop
