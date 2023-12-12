@extends('base')

@section('title', 'dashbord')

@section('content')
<h1>le nombre total de Articles est : {{$articles->count()}}</h1>
<h1>le nombre total de Categorie est : {{$categories->count()}}</h1>

@endsection