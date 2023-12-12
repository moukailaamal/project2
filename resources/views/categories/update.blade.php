@extends('base')

@section('title', 'modifier un categorie')

@section('content')
<h6>Modifier votre catégorie</h6>

<form action="{{ route('categories.update',$categorie->id) }}" method="post">
    @csrf
    @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $categorie->nom }}">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
</form>
@endsection