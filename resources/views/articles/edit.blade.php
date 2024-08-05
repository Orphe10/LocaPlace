@extends('agence.dashboard.home')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Mes articles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Modifier un article</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header">Formulaire de modification d'un article</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::get('success'))
                    <div class="alert alert-success py-3">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::get('error'))
                    <div class="alert alert-danger py-3">{{ Session::get('error') }}</div>
                    @endif
                    <form action="{{ route('ArticleUpdate', $article->id) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="from-group mb-3">
                            <label for="image">Image de l'article</label>
                            <input type="file" name="image" id="image" accept=".png,.jpg">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="name">Libelle de l'article</label>
                            <input type="text" class="form-control" name="libelle" id="name"
                                value="{{ $article->libelle }}">
                            @error('libelle')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ $article->type }}">
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="qte">La quantité de l'article</label>
                            <input type="text" class="form-control" name="qte" id="qte"
                             value="{{ $article->qte }}">
                            @error('qte')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="price">Prix de l'article</label>
                            <input type="number" class="form-control" name="price" id="price"
                                value="{{ $article->price }}">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="des">Description de l'article</label>
                            <textarea class="form-control" name="description"
                                id="des">{{ $article->description }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="available">Disponible à partir de:</label>
                            <input class="form-control" id="available" type="datetime-local" name="available_from"
                                value="{{ $article->available_from }}">
                            @error('available_from')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="from-group mb-3">
                            <label for="availables">Disponible jusqu'à:</label>
                            <input class="form-control" type="datetime-local" id="availables" name="available_until"
                                value="{{ $article->available_until }}">
                            @error('available_until')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2" style="display: flex; justify-content: center">
                            <button class="btn app-btn-primary">Modifier cet article</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
