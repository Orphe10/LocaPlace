@extends('agence.dashboard.home')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-2">Mes articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ajouter un article</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card my-2 ">
                <div class="card-header"> Formulaire d'ajout</div>
                <div class="card-body">
                    @if(Session::get('success'))
                    <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::get('error'))
                    <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                    @endif
                    <form action="{{route('ArticleHandleCreate')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <div class="from-group mb-3">
                            <label for="image">Image l'article</label>
                            <input type="file" name="image" id="image" accept=".png,.jpg" value="{{ old('image') }}">
                            @error('image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="name">Libelle de l'article</label>
                            <input type="text" class="form-control" name="libelle" id="name"
                                value="{{ old('libelle') }}">
                            @error('libelle')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="qte">La quantite de l'article</label>
                            <input type="number" class="form-control" name="qte" id="qte"
                             value="{{ old('qte') }}">
                            @error('qte')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="p">Prix de l'article</label>
                            <input type="number" class="form-control" name="price" id="p"
                                value="{{ old('price') }}">
                            @error('price')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="des">Description de l'article</label>
                            <textarea type="text" class="form-control" name="description" id="des"
                                value="{{ old('description') }}"></textarea>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="available" class="app-card-title">Disponible à partir de:</label>
                            <input class="form-control" type="datetime-local" id="available" name="available_from"
                                value="{{ old('available_from') }}">
                            @error('available_from')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="availables">Disponible jusqu'à:</label>
                            <input class="form-control" type="datetime-local" id="availables" name="available_until"
                                value="{{ old('available_until') }}">
                            @error('available_until')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3" style=" display: flex; justify-content: center">
                            <button class="btn app-btn-primary">Enrégistrer cet article</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
