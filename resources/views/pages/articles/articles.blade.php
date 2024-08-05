@extends('pages.website')

@section('content')
<!--article list start-->
<div class="container-xxl py-5 mt-5">
    <div class="container">
        @if(Session::get('success'))
        <div class="alert alert-success py-3">{{Session::get('success')}}</div>
        @endif
        @if(Session::get('error'))
        <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
        @endif
        <div class="row g-0 gx-5 align-items-end">
            <div>
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3 gros_titre text-center">Liste des objets disponibles</h1>
                </div>
            </div>
        </div>
        <div class="container mt-1 mb-4">
            <form id="searchForm" class="form-inline" action="{{ route('articles.search') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" name="objet" placeholder="Objet recherché"
                                value="{{ request('objet') }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <select id="inputCategory" class="form-control" name="category">
                                <option selected>Catégorie...</option>
                                <option {{ request('category')=='Meuble' ? 'selected' : '' }}>Meuble</option>
                                <option {{ request('category')=='Informatique' ? 'selected' : '' }}>Informatique
                                </option>
                                <option {{ request('category')=='Sonorisation' ? 'selected' : '' }}>Sonorisation
                                </option>
                                <option {{ request('category')=='Restauration' ? 'selected' : '' }}>Restauration
                                </option>
                                <option {{ request('category')=='Fabrication' ? 'selected' : '' }}>Fabrication</option>
                                <option {{ request('category')=='Musique' ? 'selected' : '' }}>Musique</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="property-item rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="{{asset('storage/'.$article->path)}}" alt="">
                        <div
                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                            {{$article->libelle}}
                        </div>
                    </div>
                    <div class="p-2 pb-0">
                        <h5 class="text-primary mb-3">{{$article->price}} FCFA</h5>
                        <a class="d-block h5 mb-2" href="">{{$article->type}}</a>
                        <p><i class="fa fa-map-marker-alt text-primary m-0"></i> 8JRG+F93,Parakou,Carrefour 3 banques
                        </p>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fas fa-project-diagram text-primary me-2"></i>{{$article->description}}</small>
                    </div>
                </div>
                <div class="mt-2">
                    @if ($article->statut == 'reserver')
                        <button type="button" class="btn btn-primary px-2 d-block w-100 disabled">Article réservé</button>
                    @elseif ($article->statut == 'louer')
                        <button type="button" class="btn btn-primary px-2 d-block w-100 disabled">Article loué</button>
                    @else
                        <a href="{{ route('reservation.index', ['article_id' => $article->id]) }}" class="btn btn-primary px-2 d-block">Réserver</a>
                    @endif
                    <a class="btn btn-primary px-2 d-block mt-1" href="{{ route('infos', $article->id) }}">Informations</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- article List End -->

<style>
    .select-wrapper {
        position: relative;
    }

    .select-wrapper::after {
        content: '\f107';
        /* FontAwesome icon code for chevron-down */
        font-family: 'FontAwesome';
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        pointer-events: none;
    }
</style>
@stop
