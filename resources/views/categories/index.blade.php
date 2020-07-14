@extends('layouts.main')

@section('pageTitle', 'Índice de categorías')

@section('content')
<h1 class="text-2xl font-bold">Índice de categorías</h1>
<p>Aquí se va a mostrar el índice de categorías... algún día</p>
<p>@include('partials.ui.button', ['label' => 'Crear categoría', 'url' => route('categories.create')])</p>

<hr>
<h2>Listado</h2>
<p><a href="{{ route('categories.show', 1) }}">Ver categoría con ID: 1</a></p>
<p><a href="{{ route('categories.show', 2) }}">Ver categoría con ID: 2</a></p>
<p><a href="{{ route('categories.show', 3) }}">Ver categoría con ID: 3</a></p>
<p><a href="{{ route('categories.show', 4) }}">Ver categoría con ID: 4</a></p>
<p><a href="{{ route('categories.show', 5) }}">Ver categoría con ID: 5</a></p>
@endsection