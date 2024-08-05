@extends('agence.dashboard.home')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    @if(Session::get('success'))
    <div class="alert alert-success py-3">{{ Session::get('success') }}</div>
    @endif
    @if(Session::get('error'))
    <div class="alert alert-danger py-3">{{ Session::get('error') }}</div>
    @endif
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Mes articles</h1>
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
                <div class="col-auto">
                    <a class="btn app-btn-primary" href="{{route('ArticleCreate')}}">
                        Ajouter article
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all"
        role="tab" aria-controls="orders-all" aria-selected="true">Tous les Articles</a>
    <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid"
        role="tab" aria-controls="orders-paid" aria-selected="false">Articles Loués</a>
    <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending"
        role="tab" aria-controls="orders-pending" aria-selected="false">Articles non Loués</a>
    <a class="flex-sm-fill text-sm-center nav-link" id="orders-reserved-tab" data-bs-toggle="tab"
        href="#orders-reserved" role="tab" aria-controls="orders-reserved" aria-selected="false">Articles Réservés</a>
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
                                <th class="cell"></th>
                                <th class="cell">Libelle</th>
                                <th class="cell">Prix</th>
                                <th class="cell">Quantité</th>
                                <th class="cell">Dispo de</th>
                                <th class="cell">Dispo jusqu'à</th>
                                <th class="cell">Statut</th>
                                <th class="cell text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                            <tr>
                                <td class="cell">{{ ++$loop->index }}</td>
                                <td class="cell">
                                    <div
                                        style="background-image: url('{{ asset('storage/'.$article->path) }}'); width:50px; height:50px; background-size:cover;background-position:center">
                                    </div>
                                </td>
                                <td class="cell"><span class="truncate">{{ $article->libelle }}</span></td>
                                <td class="cell">{{ $article->price }}</td>
                                <td class="cell">{{ $article->qte }}</td>
                                <td class="cell">{{ $article->available_from }}</td>
                                <td class="cell">{{ $article->available_until }}</td>
                                <td class="cell">
                                    <span class="badge bg-warning">
                                        @if ($article->statut == 'louer')
                                        Rupture de stock
                                        @elseif ($article->statut == 'reserver')
                                        Réservé
                                        @else
                                        Disponible
                                        @endif
                                    </span>
                                </td>
                                <td class="cell">
                                    <a class="btn btn-primary btn-sm px-2"
                                        href="{{ route('ArticleEdit', $article->id) }}">Modifier</a>
                                    <a href="{{ route('ArticleDelete', $article->id) }}"
                                        class="btn btn-danger btn-sm ms-3"
                                        onclick="return confirmDelete(event)">Supprimer</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="cell text-center fs-5 text-dark" colspan="9">Aucun article ajouté</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!--//table-responsive-->
            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
        <nav class="app-pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        <!--//app-pagination-->
    </div>
    <!--//tab-pane-->

    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">N°</th>
                                <th class="cell"></th>
                                <th class="cell">Libelle</th>
                                <th class="cell">Quantité</th>
                                <th class="cell">Loué de</th>
                                <th class="cell">Loué jusqu'à</th>
                                <th class="cell">Client</th>
                                <th class="cell">Téléphone</th>
                                <th class="cell text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                @if ($article->statut === 'louer' && $article->reservation)
                                    <tr>
                                        <td class="cell">{{ $loop->iteration }}</td>
                                        <td class="cell">
                                            <div style="background-image: url('{{ asset('storage/' . $article->path) }}'); width:50px; height:50px; background-size:cover;background-position:center"></div>
                                        </td>
                                        <td class="cell"><span class="truncate">{{ $article->libelle }}</span></td>
                                        <td class="cell">{{ $article->qte }}</td>
                                        <td class="cell">{{ $article->reservation->start_date }}</td>
                                        <td class="cell">{{ $article->reservation->end_date }}</td>
                                        <td class="cell">{{ $article->reservation->user->name }} {{ $article->reservation->user->prenom }}</td>
                                        <td class="cell">{{ $article->reservation->user->num }}</td>
                                        <td class="cell">
                                            <a href="{{ route('ArticleLoueEdit', $article->reservation->id) }}" class="btn btn-primary btn-sm">Prolonger</a>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="cell text-center fs-5 text-dark" colspan="9">Aucun article loué</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">N°</th>
                                <th class="cell"></th>
                                <th class="cell">Libelle</th>
                                <th class="cell">Prix</th>
                                <th class="cell">Quantité</th>
                                <th class="cell">Dispo de</th>
                                <th class="cell">Dispo jusqu'à</th>
                                <th class="cell">Statut</th>
                                <th class="cell text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles->where('statut', NULL) as $article)
                            <tr>
                                <td class="cell">{{ ++$loop->index }}</td>
                                <td class="cell">
                                    <div
                                        style="background-image: url('{{ asset('storage/'.$article->path) }}'); width:50px; height:50px; background-size:cover;background-position:center">
                                    </div>
                                </td>
                                <td class="cell"><span class="truncate">{{ $article->libelle }}</span></td>
                                <td class="cell">{{ $article->price }}</td>
                                <td class="cell">{{ $article->qte }}</td>
                                <td class="cell">{{ $article->available_from }}</td>
                                <td class="cell">{{ $article->available_until }}</td>
                                <td class="cell">
                                    <span class="badge bg-warning">
                                        @if ($article->statut == 'louer')
                                        Rupture de stock
                                        @elseif ($article->statut == 'reserver')
                                        Réservé
                                        @else
                                        Disponible
                                        @endif
                                    </span>
                                </td>
                                <td class="cell">
                                    <a class="btn btn-primary btn-sm px-2"
                                        href="{{ route('ArticleEdit', $article->id) }}">Modifier</a>
                                    <a href="{{ route('ArticleDelete', $article->id) }}"
                                        class="btn btn-danger btn-sm ms-3"
                                        onclick="return confirmDelete(event)">Supprimer</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="cell text-center fs-5 text-dark" colspan="9">Aucun article en attente</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Tab for Reserved Articles -->
    <div class="tab-pane fade" id="orders-reserved" role="tabpanel" aria-labelledby="orders-reserved-tab">
        <div class="app-card app-card-orders-table mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">N°</th>
                                <th class="cell"></th>
                                <th class="cell">Libelle</th>
                                <th class="cell">Prix</th>
                                <th class="cell">Quantité</th>
                                <th class="cell">Dispo de</th>
                                <th class="cell">Dispo jusqu'à</th>
                                <th class="cell">Statut</th>
                                <th class="cell text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles->where('statut', 'reserver') as $article)
                            <tr>
                                <td class="cell">{{ ++$loop->index }}</td>
                                <td class="cell">
                                    <div
                                        style="background-image: url('{{ asset('storage/'.$article->path) }}'); width:50px; height:50px; background-size:cover;background-position:center">
                                    </div>
                                </td>
                                <td class="cell"><span class="truncate">{{ $article->libelle }}</span></td>
                                <td class="cell">{{ $article->price }}</td>
                                <td class="cell">{{ $article->qte }}</td>
                                <td class="cell">{{ $article->available_from }}</td>
                                <td class="cell">{{ $article->available_until }}</td>
                                <td class="cell">
                                    <span class="badge bg-warning">Réservé</span>
                                </td>
                                <td class="cell">
                                    <a class="btn btn-primary btn-sm px-2" href="#"
                                        onclick="confirmAction('{{ route('confirmReservation', $article->reservation->id) }}', 'Confirmer cette réservation ?')">Confirmer</a>
                                    <a class="btn btn-danger btn-sm ms-3" href="#"
                                        onclick="confirmAction('{{ route('cancelReservation', $article->reservation->id) }}', 'Annuler cette réservation ?')">Annuler</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="cell text-center fs-5 text-dark" colspan="9">Aucun article réservé</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!--//table-responsive-->
            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
    </div>
    <!--//tab-pane-->

</div>
<!--//tab-content-->

<!-- JavaScript for confirmation dialog -->
<script type="text/javascript">
    function confirmDelete(event) {
        if (!confirm("Êtes-vous sûr de vouloir supprimer cet article ?")) {
            event.preventDefault();
        }
    }
    function confirmAction(url, message) {
    if (confirm(message)) {
    window.location.href = url;
    }
    }
</script>

@endsection
