@extends('agence.dashboard.home')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Articles Confirmés</h1>
    </div>
</div>

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
                        <th class="cell">Prix</th>
                        <th class="cell">Loué de</th>
                        <th class="cell">Loué jusqu'à</th>
                        <th class="cell">Locataire</th>
                        <th class="cell">Téléphone</th>
                        <th class="cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($confirmed_articles as $article)
                    <tr>
                        <td class="cell">{{ ++$loop->index }}</td>
                        <td class="cell">
                            <div
                                style="background-image: url('{{ asset('storage/'.$article->article->path) }}'); width:50px; height:50px; background-size:cover;background-position:center">
                            </div>
                        </td>
                        <td class="cell"><span class="truncate">{{ $article->article->libelle }}</span></td>
                        <td class="cell">{{ $article->Qte }}</td>
                        <td class="cell">{{ $article->article->price }}</td>
                        <td class="cell">{{ $article->start_date }}</td>
                        <td class="cell">{{ $article->end_date }}</td>
                        <td class="cell">{{ $article->user->name}} {{ $article->user->prenom }}</td>
                        <td class="cell">{{ $article->Tel }}</td>
                        <td class="cell">
                            @php
                                $payment = $payments->get($article->id);
                            @endphp
                            @if ($payment && $payment->status == 'pending')
                                <button type="button" class="btn btn-warning btn-sm py-1 px-4" disabled>Payé</button>
                            @else
                                <form action="{{ route('payerCommission') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    <input type="hidden" name="user_id" value="{{ $article->user_id }}">
                                    <input type="hidden" name="amount" value="{{ $article->article->price * 0.1 }}">
                                    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                                        data-public-key="pk_sandbox_JhBImrbPHgVY0PJgM0tHlGyn"
                                        data-button-text="Payer commission"
                                        data-button-class="btn btn-sm app-btn-primary py-1"
                                        data-transaction-amount="{{ $article->article->price * 0.1 }}"
                                        data-transaction-description="Paiement de commission" data-currency-iso="XOF">
                                    </script>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="cell text-center fs-5 text-dark" colspan="9">Pas de réservation</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
