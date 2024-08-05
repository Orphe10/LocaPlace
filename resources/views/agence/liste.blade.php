@extends('agence.dashboard.home')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Mes Clients</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center" method="GET"
                        action="{{ route('ArticleIndex') }}">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders"
                                placeholder="Search" value="{{ request('searchorders') }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Recherche</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all"
        role="tab" aria-controls="orders-all" aria-selected="true">Mes Clients</a>
</nav>

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">N°</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Prénom</th>
                                <th class="cell">Libelle</th>
                                <th class="cell">Quantité</th>
                                <th class="cell">Date de début</th>
                                <th class="cell">Date de retour</th>
                                <th class="cell">Numéro de téléphone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clients as $index => $reservation)
                            <tr>
                                <td class="cell">{{ $index + 1 }}</td>
                                <td class="cell">{{ $reservation->user->name }}</td>
                                <td class="cell">{{ $reservation->user->prenom }}</td>
                                <td class="cell">{{ $reservation->article->libelle }}</td>
                                <td class="cell">{{ $reservation->Qte }}</td>
                                <td class="cell">{{ $reservation->start_date }}</td>
                                <td class="cell">{{ $reservation->end_date }}</td>
                                <td class="cell">{{ $reservation->user->num }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="cell text-center fs-5 text-dark" colspan="8">Aucun client ajouté</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
