@extends('agence.dashboard.home')

@section('content')
<div class="container-xl">
    <h1 class="app-page-title">Paramètres</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-12 ">
            <h3 class="section-title text-uppercase d-flex justify-content-center">Informations personnelles</h3>
            <div class="section-intro d-flex justify-content-center">Modifiez vos informations personnelles ici.</div>
        </div>
        <div class="col-12 col-md-10 offset-1">
            <div class="app-card app-card-settings shadow-sm p-4">
                @if(Session::get('success'))
                <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                @endif
                @if(Session::get('error'))
                <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                @endif
                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('agence.updateProfile') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom de l'agence</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $agence->name }}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email de l'agence</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $agence->email }}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example1cg">Numero de téléphone</label>
                            <div class="input-group">
                                <input type="text" id="phone" name="num" class="form-control form-control-lg"
                                    value="{{ $agence->num ?? '' }}" />
                                <div class="input-group-append">
                                    <span class="input-group-text" id="network-icon"></span>
                                </div>
                            </div>
                            <div id="error-message" class="text-danger"></div>
                            @error('num')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image de l'agence</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn app-btn-primary ">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
            networkIcon.innerHTML = `<img src="${icon}" alt="Network Icon" style="width: 20px; height: 20px;">`;
        } else {
            networkIcon.innerHTML = '';
        }
    });
</script>

<script>
    .input-group-text img {
    width: 20px;
    height: 20px;
}
</script>
@endsection
