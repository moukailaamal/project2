@extends('base')

@section('title', 'login')

@section('content')
<h5>login</h5>
<form action="{{ route('auth.login') }}" method="post">
@csrf
    
    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="email"name="email" id="email" class="form-control" placeholder=" Votre email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">password</label>
      <input type="password"name="password" id="password" class="form-control" placeholder=" Votre password">
    </div>
    
    <button type="submit" class="btn btn-primary">login</button>
</form>
  

@endsection