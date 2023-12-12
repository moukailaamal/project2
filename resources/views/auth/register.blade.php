@extends('base')

@section('title', 'cree un categorie')

@section('content')
<h5>Cree votre compte</h5>
<form action="{{ route('auth.register') }}" method="post">
@csrf
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text"name="name" id="nom" class="form-control" placeholder=" Votre Nom">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="email"name="email" id="email" class="form-control" placeholder=" Votre email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">password</label>
      <input type="password"name="password" id="password" class="form-control" placeholder=" Votre password">
    </div>
    <div class="mb-3">
      <label for="adresse" class="form-label">adresse</label>
      <input type="text"name="adresse" id="adresse" class="form-control" placeholder=" Votre adresse">
    </div>
    <div class="mb-3">
      <label for="numero" class="form-label">numero</label>
      <input type="numero"name="numero" id="numero" class="form-control" placeholder=" Votre numero">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
  

@endsection