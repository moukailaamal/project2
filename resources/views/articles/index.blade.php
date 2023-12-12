@extends('base')

@section('title', 'Les articles')

@section('content')
   <h1 class="text-center">article</h1>
   @if (Auth::check())
      <a class="btn btn-primary" href="{{route('articles.create')}}">cree un novelle article</a>
    @endif
   <table class="table table-bordered">
    <thead>
    <tr>
      <th>id</th>
      <th>nom</th>
      <th>prix</th>
      <th>description</th>
      <th>categorie_nom</th>
      <th>image</th>
      @if(Auth::check())
      <th>modifier</th>
      <th>supprimer</th>
      @endif
    </tr>
  </thead>
  <tbody>
  @foreach ($articles as $article)
    <tr>
      <td class="text-center">{{$article->id}}</td>
      <td class="text-center">{{$article->nom}}</td>
      <td class="text-center">{{$article->prix}}</td>
      <td class="text-center">{{$article->description}}</td>
      <td class="text-center">{{$article->categorie->nom}}</td>
      <td class="text-center" ><img src="{{ asset($article->image_path) }}" alt="Image de l'article" style="width: 100px; height: 100px;"></td>
      <td class="text-center">
      @if (Auth::check())
      <a class="btn btn-primary"   href="{{ route('articles.edit', $article->id) }}">Modifier</a>
      @endif
    </td>
      
      <td class="text-center">
      @if (Auth::check())
      <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>
    @endif
</td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
        <th colspan="8" class="text-center bg-secondary">Le nombre total d'articles</th>
    </tr>
    <tr>
        <td colspan="8" class="text-center bg-secondary ">{{ $articles->count() }}</td>
    </tr>
</tfoot>

</table>

@endsection
  