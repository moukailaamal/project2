@extends('base')

@section('title', 'modifier un article')
 
@section('content')
<h6>modifier votre article</h6>
<form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
    
    
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" id="nom"  name="nom"class="form-control" value="{{$article->nom}}">
    </div>
    <div class="mb-3">
      <label for="prix" class="form-label">Prix</label>
      <input type="number" name="prix"id="prix" class="form-control"value="{{$article->prix}}">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">description</label>
      <input type="text" id="description" name="description"class="form-control" value="{{$article->description}}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">choisir l'image voudrai</label>
        <input class="form-control" name="image"type="file" id="image">
    </div>
    <div class="mb-3">
      <label for="categorie_id" class="form-label">Selection votre categorie</label>
      <select id="categorie_id"name="categorie_id" class="form-select">
          @foreach ($categories as $categorie)
            <option value="{{ $categorie->id }}" {{ $article->categorie_id == $categorie->id ? 'selected' : '' }}>
                {{ $categorie->nom }}
            </option>     
          @endforeach
        </select>

    </div>
    <button type="submit" class="btn btn-primary">modifier</button>
</form>

@endsection