@extends('admin.dashboard.template')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Liste des utilisateurs</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders"
                                placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Recherche</button>
                        </div>
                    </form>

                </div>
            </div>
            <!--//row-->
        </div>
        <!--//table-utilities-->
    </div>
    <!--//col-auto-->
</div>
<!--//row-->

@if (Session::get('error'))
<div class="alert alert-danger">
    {{ Session::get('error') }}
</div>
@endif
@if (Session::get('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <th class="cell">#</th>
                                <th class="cell">Nom</th>
                                <th class="cell">Prénom</th>
                                <th class="cell">Email</th>
                                <th class="cell">Numéro</th>
                                <th class="cell">Statut</th>
                                <th class="cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($locataire as $locataires)
                            <tr>
                                <td class="cell">{{ ++$loop->index }}</td>
                                <td class="cell">{{ $locataires->name }}</td>
                                <td class="cell">{{ $locataires->prenom }}</td>
                                <td class="cell">{{ $locataires->email }}</td>
                                <td class="cell">{{ $locataires->num }}</td>
                                <td class="cell">
                                    @if ($locataires->is_active)
                                    <span class="badge bg-success">Actif</span>
                                    @else
                                    <span class="badge bg-danger">Inactif</span>
                                    @endif
                                </td>
                                <td class="cell">
                                    <form action="{{route('ActivationUtilisateur', $locataires->id) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn btn-sm {{ $locataires->is_active ? 'btn-danger' : 'btn-success' }}">Désactiver</button>
                                    </form>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td class="cell text-center fs-5 text-dark" colspan="6">Pas d'utilisateur
                                </td>
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

@stop
