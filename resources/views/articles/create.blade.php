@extends('base')

@section('title', 'cree un article')

@section('content')
<h5>Cree votre article</h5>
<form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text"name="nom" id="nom" class="form-control" placeholder=" Votre Nom">
    </div>
    <div class="mb-3">
      <label for="prix" class="form-label">Prix</label>
      <input type="number" name="prix"id="prix" class="form-control" placeholder="Prix">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">description</label>
      <input type="text" id="description"name="description" class="form-control" placeholder="descrire">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">choisir l'image voudrai</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="mb-3">
        <label for="categorie_id" class="form-label">Sélectionnez votre catégorie</label>
        <select name="categorie_id" id="categorie_id" class="form-select">
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
  

@endsection