@extends('admin.dashboard.template')

@section('content')
<div class="container-fluid px-4">
    <div class="row g-4 mb-4">
            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">Total des propriétaires</h4>
                        <div class="stats-figure">{{$prope->count()}}</div>
                    </div>
                    <a class="app-card-link-mask" href="{{ route('admin.agences.index') }}"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">total des utilisateurs</h4>
                        <div class="stats-figure">{{$locataire->count()}}</div>
                    </div>
                    <a class="app-card-link-mask" href="{{ route('admin.locataire.liste') }}"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">articles disponibles</h4>
                        <div class="stats-figure">{{$dispo->count()}}</div>
                    </div>
                    <a class="app-card-link-mask" href="{{ route('admin.article.approuve') }}"></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="app-card app-card-stat shadow-sm h-100">
                    <div class="app-card-body p-3 p-lg-4">
                        <h4 class="stats-type mb-1">total des articles loués</h4>
                        <div class="stats-figure">{{$louer->count()}}</div>
                    </div>
                    <a class="app-card-link-mask" href="#"></a>
                </div>
            </div>
    </div>
</div>

@endsection
