@extends('pages.website')

@section('content')
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            @if(Session::get('success'))
            <div class="alert alert-success py-3">{{ Session::get('success') }}</div>
            @endif
            @if(Session::get('error'))
            <div class="alert alert-danger py-3">{{ Session::get('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-5">
                    <div class="booking-cta">
                        <h1>Faites votre réservation</h1>
                        <p>En toute simplicité, faites la réservation de vos objets aux besoins en remplissant ce
                            formulaire :</p>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    @php
                    $article_id = request()->get('article_id');
                    $article = App\Models\Article::find($article_id);
                    @endphp
                    <div class="booking-form">
                        <form action="{{ route('reservation.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article_id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5 class="">Nom</h5>
                                        <label><span class="text-uppercase">{{ auth()->user()->name }}</span>
                                            {{ auth()->user()->prenom }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5 class="">Email</h5>
                                        <label>{{ auth()->user()->email }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group phone-group">
                                        <input class="form-control" type="tel" id="phone" name="Tel"
                                            value="{{ old('Tel', '+229') }}">
                                        <span class="form-label">Téléphone</span>
                                        <div id="network-icon" class="network-icon"></div>
                                        <div id="error-message" class="text-danger"></div>
                                        @error('Tel')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="Qte" value="{{ old('Qte') }}">
                                        <span class="form-label">Quantité</span>
                                        @error('Qte')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="datetime-local" name="start_date"
                                            id="start_date" value="{{ old('start_date') }}">
                                        <span class="form-label">Date de location</span>
                                        @error('start_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="datetime-local" name="end_date" id="end_date"
                                            value="{{ old('end_date') }}">
                                        <span class="form-label">Date de retour</span>
                                        @error('end_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary d-block px-3">Réserver Maintenant</button>
                            {{-- <form action="{{ route('ArticleMakePayment') }}" method="POST">
                                @method('post')
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7" data-public-key="pk_sandbox_JhBImrbPHgVY0PJgM0tHlGyn"
                                    data-button-text="Louer maintenant" data-button-class="btn btn-primary"
                                    data-transaction-amount="{{ $article->price }}" data-transaction-description="{{ $article->description }}"
                                    data-currency-iso="XOF">
                                </script>
                            </form> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Définir la date minimale pour les champs de date comme la date actuelle
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('start_date').setAttribute('min', today);
        document.getElementById('end_date').setAttribute('min', today);

        // Validation des dates
        document.querySelector('form').addEventListener('submit', function(event) {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            if (startDate > endDate) {
                event.preventDefault();
                alert('La date de fin doit être après la date de début.');
            }
        });

        // Script de validation du téléphone
        document.getElementById('phone').addEventListener('input', function() {
            const phoneInput = this.value;
            const networkIcon = document.getElementById('network-icon');
            const errorMessage = document.getElementById('error-message');
            let icon = '';

            if (!phoneInput.startsWith('+229')) {
                this.value = '+229';
            }

            const number = phoneInput.substring(4);

            const mtnPrefixes = ['42', '46', '50', '51', '52', '53', '54', '56', '57', '58', '59', '61', '62', '66', '67', '69', '90', '91', '96', '97'];
            const moovPrefixes = ['55', '60', '63', '64', '65', '68', '94', '95', '98', '99'];
            const celtisPrefixes = ['40', '41','43', '44'];

            if (mtnPrefixes.some(prefix => number.startsWith(prefix))) {
                icon = '{{ asset('img/mtn.png') }}';
                errorMessage.innerText = '';
            } else if (moovPrefixes.some(prefix => number.startsWith(prefix))) {
                icon = '{{ asset('img/Moov_Africa.png') }}';
                errorMessage.innerText = '';
            } else if (celtisPrefixes.some(prefix => number.startsWith(prefix))) {
                icon = '{{ asset('img/celtis.png') }}';
                errorMessage.innerText = '';
            } else {
                errorMessage.innerText = 'Numéro de téléphone invalide';
            }

            if (icon) {
                networkIcon.innerHTML = `<img src="${icon}" alt="Network Icon">`;
                networkIcon.classList.add('show');
            } else {
                networkIcon.innerHTML = '';
                networkIcon.classList.remove('show');
            }
        });
    });
</script>

<style>
    .form-group {
        position: relative;
    }

    .phone-group {
        display: flex;
        align-items: center;
    }

    #phone {
        flex-grow: 1;
    }

    .network-icon {
        margin-left: 10px;
        width: 32px;
        height: 32px;
    }

    .network-icon img {
        max-width: 100%;
        max-height: 100%;
    }

    .section {
        position: relative;
        height: 100vh;
    }

    .section .section-center {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    #booking {
        font-family: 'Montserrat', sans-serif;
        background-image: url('img/flat-lay-utensils-composition-arrangement.jpg');
        background-size: cover;
        background-position: center;
    }

    #booking::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: rgba(255, 255, 255, 0.8);
    }

    .booking-cta {
        margin-top: 45px;
    }

    .booking-cta h1 {
        font-size: 52px;
        text-transform: uppercase;
        color: blue;
        font-weight: 900;
    }

    .booking-cta p {
        font-size: 22px;
        color: #181818;
        margin-left: -2px;
        margin-right: 10px;
        text-align: justify;
    }

    .booking-form {
        background: #fff;
        -webkit-box-shadow: 0px 0px 10px -5px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 0px 10px -5px rgba(0, 0, 0, 0.3);
        max-width: 642px;
        width: 100%;
        margin: auto;
        padding: 40px 30px;
    }

    .booking-form .form-group {
        position: relative;
        margin-bottom: 20px;
    }

    .booking-form .form-control {
        background-color: #fff;
        height: 60px;
        padding: 25px 10px 10px 10px;
        color: #181818;
        font-size: 16px;
        font-weight: 700;
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 2px solid rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        -webkit-transition: 0.2s;
        transition: 0.2s;
    }

    .booking-form .form-control:focus {
        border-color: blue;
    }

    .booking-form .form-control::-webkit-input-placeholder {
        color: rgba(0, 0, 0, 0.2);
    }

    .booking-form .form-control:-ms-input-placeholder {
        color: rgba(0, 0, 0, 0.2);
    }

    .booking-form .form-control::placeholder {
        color: rgba(0, 0, 0, 0.2);
    }

    .booking-form input[type="date"].form-control:invalid {
        color: rgba(0, 0, 0, 0.2);
    }

    .booking-form select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .booking-form select.form-control+.select-arrow {
        position: absolute;
        right: 10px;
        bottom: 7px;
        width: 32px;
        line-height: 32px;
        height: 32px;
        text-align: center;
        pointer-events: none;
        color: rgba(0, 0, 0, 0.2);
        font-size: 14px;
    }

    .booking-form select.form-control+.select-arrow:after {
        content: '\279C';
        display: block;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .booking-form .form-label {
        color: rgba(0, 0, 0, 0.2);
        font-weight: 700;
        position: absolute;
        top: 5px;
        left: 10px;
        text-transform: uppercase;
        line-height: 24px;
        height: 23px;
        font-size: 14px;
        pointer-events: none;
    }

    .booking-form .form-group.input-not-empty .form-label,
    .booking-form .form-group .form-control:focus+.form-label {
        top: 5px;
        color: blue;
        font-size: 14px;
    }

    .booking-form .submit-btn {
        color: #fff;
        background-color: blue;
        font-weight: 700;
        height: 55px;
        padding: 10px 35px;
        font-size: 18px;
        border: none;
        display: block;
        width: 100%;
        text-transform: capitalize;
    }
</style>
@stop
