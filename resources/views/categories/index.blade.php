@extends('base')

@section('title', 'Les categories')

@section('content')
   <h1 class="text-center">categories</h1>
   @if(Auth::check())
    <a class="btn btn-primary" href="{{route('categories.create')}}">cree un novelle categories</a>
    @endif
   <table class="table">
  <thead>
    <tr>
      <th class="text-center">id</th>
      <th class="text-center">nom</th>
      @if(Auth::check())
      <th class="text-center">modifier</th>
      <th class="text-center">supprimer</th>
      @endif
    </tr>
  </thead>
  <tbody>
  @foreach ($categories as $categorie)
    <tr>
      <td class="text-center">{{$categorie->id}}</td>
      <td class="text-center">{{$categorie->nom}}</td>

      <td class="text-center">
        @if(Auth::check())
        <a class="btn btn-primary"  href="{{ route('categories.edit', $categorie->id) }}">Modifier</a>
      </td>
      <td class="text-center">
          <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
 
</table>

@endsection