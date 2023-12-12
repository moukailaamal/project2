@extends('base')

@section('title', 'cree un categorie')

@section('content')
<h5>Cree votre categories</h5>
<form action="{{route('categories.store')}}" method="post">
@csrf
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text"name="nom" id="nom" class="form-control" placeholder=" Votre Nom">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
  
</form>

@endsection