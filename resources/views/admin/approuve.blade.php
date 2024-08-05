@extends('admin.dashboard.template')

@section('content')
<div class="container-fluid px-4">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Administrateur</h1>
        </div>
    </div>
    <!--//row-->

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
                                    @if ($article->is_approved)
                                    <span class="badge bg-success">Approuvé</span>
                                    @else
                                    <span class="badge bg-warning">Non approuvé</span>
                                    @endif
                                </td>
                                <td class="cell text-center">
                                    @if (!$article->is_approved)
                                    <a href="{{ route('approveArticle', $article->id) }}" class="btn btn-primary btn-sm px-2"
                                        onclick="return confirm('Voulez-vous vraiment approuver cet article ?')">Approuver</a>
                                    @else
                                    <a href="{{ route('disapproveArticle', $article->id) }}" class="btn btn-warning btn-sm"
                                        onclick="return confirm('Voulez-vous vraiment désapprouver cet article ?')">Désapprouver</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="cell text-center fs-5 text-dark" colspan="9">Aucun article</td>
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
</div>
@endsection
