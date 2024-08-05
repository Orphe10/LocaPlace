@extends('pages.website')

@section('content')

    <section class="bg-image ">
        <div class="mask d-flex align-items-center gradient-custom-3">
            <div class="container mt-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5 my-5">
                                <h2 class="text-uppercase text-center text-primary mb-5">créer votre compte</h2>
                                @if (Session::get('success'))
                                    <div class="alert alert-success py-3">{{ Session::get('success') }}</div>
                                @endif
                                @if (Session::get('error'))
                                    <div class="alert alert-danger py-3">{{ Session::get('error') }}</div>
                                @endif
                                <form method="POST" action="{{ route('HandleLocataireRegister') }}">
                                    @method('post')
                                    @csrf
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Votre Nom</label>
                                        <input type="text" id="form3Example1cg" name="name"
                                            class="form-control form-control-lg" />
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Votre Prénom</label>
                                        <input type="text" id="form3Example1cg" name="prenom"
                                            class="form-control form-control-lg" />
                                        @error('prenom')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1cg">Numero de téléphone</label>
                                        <div class="input-group">
                                            <input type="text" id="phone" name="num"
                                                class="form-control form-control-lg" />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="network-icon"></span>
                                            </div>
                                        </div>
                                        <div id="error-message" class="text-danger"></div>
                                        @error('num')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Votre Email</label>
                                        <input type="email" id="form3Example3cg" name="email"
                                            class="form-control form-control-lg" />
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" id="form3Example4cg" name="password"
                                            class="form-control form-control-lg" />
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cdg">Confirmer votre password</label>
                                        <input type="password" id="form3Example4cdg" name="password_confirmation"
                                            class="form-control form-control-lg" />
                                        @error('password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn px-2 btn-lg btn-primary text-light text-center">S'inscrire</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Avez-vous déjà un compte?
                                        <u class="fw-bold text-body" onclick="openpopup0()" style="cursor: pointer;">Se
                                            connecter ici</u>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('phone').addEventListener('input', function() {
            const phoneInput = this.value;
            const networkIcon = document.getElementById('network-icon');
            const errorMessage = document.getElementById('error-message');
            let icon = '';

            if (!phoneInput.startsWith('+229')) {
                this.value = '+229';
            }

            const number = phoneInput.substring(4);

            const mtnPrefixes = ['42', '46', '50', '51', '52', '53', '54', '56', '57', '58', '59', '61', '62', '66',
                '67', '69', '90', '91', '96', '97'
            ];
            const moovPrefixes = ['55', '60', '63', '64', '65', '68', '94', '95', '98', '99'];
            const celtisPrefixes = ['40', '41', '43', '44'];

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
                networkIcon.innerHTML = `<img src="${icon}" alt="Network Icon" style="width: 20px; height: 20px;">`;
            } else {
                networkIcon.innerHTML = '';
            }
        });
    </script>

    <script>
        .input - group - text img {
            width: 20 px;
            height: 20 px;
        }
    </script>

@stop
