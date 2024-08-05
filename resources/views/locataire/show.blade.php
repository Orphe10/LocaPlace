@extends('pages.website')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container pt-5 mt-5 profile-content">
    <div class="profile-header d-flex justify-content-center align-items-center">
        <div class="profile-picture-wrapper">
            @if ($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" id="profilePicture"
                class="rounded-circle">
            @else
            <i class="fas fa-user-circle fa-7x" style="color: #ccc;"></i>
            @endif

            <form id="profilePictureForm" action="{{ route('profile.updatePicture') }}" method="POST"
                enctype="multipart/form-data" class="d-none">
                @csrf
                @method('PATCH')
                <input type="file" name="profile_picture" id="profilePictureInput" accept="image/*">
            </form>

            <label for="profilePictureInput" class="add-icon mb-4">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </label>
        </div>
        {{-- <form id="deletePictureForm" action="{{ route('profile.deletePicture') }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
            <button type="submit" id="deletePictureButton">Supprimer la photo</button>
        </form> --}}
        <div class="text-right">
            <h1 class="h1">{{ $user->name }} {{ $user->prenom }}</h1>
            <p>{{ $user->email }}</p>
            @if ($user->profile_picture)
            <button class="btn btn-danger supprimer ms-auto" type="button" id="deletePictureButton">Supprimer la
                photo</button>
            @endif
        </div>

    </div>
    <div class="profile-content1 mt-4">
        <h2 class="text-primary text-center">Informations Personnelles</h2>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="my-5 col-lg-offset-2 col-8">
                <div class="mb-3 form-group">
                    <label for="form3Example1cg" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="form3Example1cg" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="name" name="prenom" value="{{ $user->prenom }}"
                        required>
                </div>
                <div class="mb-3 form-group">
                    <label for="form3Example1cg" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                        required>
                </div>
                <div class="mb-3 form-group">
                    <label class="form-label" for="form3Example1cg">Numero de téléphone</label>
                    <div class="input-group">
                        <input type="text" id="phone" name="num" class="form-control form-control-lg"
                            value="{{ $user->num }}" />
                        <div class="input-group-append">
                            <span class="input-group-text" id="network-icon"></span>
                        </div>
                    </div>
                    <div id="error-message" class="text-danger"></div>
                    @error('num')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary  px-2">Mettre à jour</button>
                </div>
            </div>
        </form>

        <h2 class="text-primary pt-4 text-center">Mes Réservations</h2>
        @if ($reservations->isEmpty())
        <p class=" text-center">Aucune réservation trouvée.</p>
        @else
        <div class="reservation">
            <table class="table table-bordered table-condensed table-striped align-content-center">
                <thead>
                    <tr>
                        <th scope="col">Article</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Date de début</th>
                        <th scope="col">Date de retpur</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->article->libelle }}</td>
                        <td>{{ $reservation->Qte }}</td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>
                            <div
                                style="background-image: url('{{ asset('storage/'.$reservation->article->path) }}'); width:70px; height:50px; background-size:cover;background-position:center">
                            </div>
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary btn-sm py-2 px-2" onclick="togglePopup()">Modifer</a>
                            <a class="btn btn-primary btn-sm py-2 px-2 ms-3" onclick="togglePopup1()">Noter</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Formulaire de mise à jour de réservation -->
            <div id="popup-overlay">
                <div class="popup-content">
                    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="start_date_{{ $reservation->id }}">Quantité</label>
                            <input type="number" id="qte_{{ $reservation->id }}" name="Qte"
                                value="{{ $reservation->Qte }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="start_date_{{ $reservation->id }}">Date de début</label>
                            <input type="datetime-local" id="start_date_{{ $reservation->id }}" name="start_date"
                                value="{{ $reservation->start_date }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end_date_{{ $reservation->id }}">Date de retour</label>
                            <input type="datetime-local" id="end_date_{{ $reservation->id }}" name="end_date"
                                value="{{ $reservation->end_date }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary popup-link">Mettre à jour</button>
                        <a href="javascript:void(0)" class="popup-exit" onclick="togglePopup()">X</a>
                    </form>
                </div>
            </div>



            <!-- Formulaire de notation -->
            <div id="popup-overlay1" style="display: none">
                <div class="popup-content1">
                    <form action="{{ route('rating.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $reservation->article_id }}">
                        <div class="form-group">
                            <label for="rating">Note</label>
                            <select name="rating" id="rating" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comment">Commentaire</label>
                            <textarea name="comment" id="comment" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary popup-link1">Noter</button>
                        <a href="javascript:void(0)" class="popup-exit1" onclick="togglePopup1">X</a>
                    </form>
                </div>
            </div>

        </div>
        @endif
    </div>
</div>


<style>
    /*popup*/
    * {
        margin: 0;
        padding: 0;
    }

    #popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.2);
        z-index: 98;
        display: none;
    }

    #popup-overlay.open {
        display: block !important;
    }

    .popup-content {
        max-width: 600px;
        width: 100%;
        padding: 30px;
        box-sizing: border-box;
        background: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)
    }

    .popup-link {
        text-decoration: none;
        color: white;
        background: blue;
        padding: 10px, 20px;
        border-radius: 5px;
        display: inline-block;
    }

    .popup-exit {
        position: absolute;
        top: -10px;
        right: -10px;
        text-decoration: none;
        color: white;
        background: blue;
        padding: 5px 10px;
        border-radius: 5px;
    }

    #popup-overlay1 {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.2);
        z-index: 98;
        display: none;
    }

    #popup-overlay1.open {
        display: block !important;
    }

    .popup-content1 {
        max-width: 600px;
        width: 100%;
        padding: 30px;
        box-sizing: border-box;
        background: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)
    }

    .popup-link1 {
        text-decoration: none;
        color: white;
        background: blue;
        padding: 10px, 20px;
        border-radius: 5px;
        display: inline-block;
    }

    .popup-exit1 {
        position: absolute;
        top: -10px;
        right: -10px;
        text-decoration: none;
        color: white;
        background: blue;
        padding: 5px 10px;
        border-radius: 5px;
    }



    .h1 {
        padding-left: 8px;
    }

    #profilePicture {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 2px solid #007bff;
    }

    .profile-picture-wrapper {
        position: relative;
        display: inline-block;
    }

    .profile-picture-wrapper img {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .add-icon {
        position: absolute;
        bottom: 0;
        right: 0;
        font-size: 24px;
        color: #007bff;
        cursor: pointer;
        background-color: white;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .col-lg-offset-2 {
        margin-left: 17%;
    }

    .col-lg-offset-3 {
        margin-left: 30%;
    }

    body {
        background-color: #DDDDD;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .profile-header {
        position: relative;
        margin-bottom: 50px;
    }

    .profile-header img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .profile-header h1 {
        font-size: 2.5rem;
    }

    .profile-header p {
        font-size: 1.2rem;
        color: gray;
    }

    .profile-content1 {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table img {
        width: 80px;
        height: 50px;
    }

    .form-control {
        margin-bottom: 10px;
    }

    .input - group - text img {
        width: 20 px;
        height: 20 px;
    }

    .supprimer {
        width: 120px;
        height: 20px;
        font-size: 10px;
    }
</style>

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
@endsection
