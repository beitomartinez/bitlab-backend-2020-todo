@extends('layouts.main')

@section('pageTitle', 'Índice de categorías')

@section('content')

@if (session('cat_stored'))
<div class="border border-green-500 p-1 text-center text-green-500">Categoría almacenada con éxito</div>
@endif

<h1 class="text-2xl font-bold">Índice de categorías</h1>
<p class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat ab quidem maxime? Corrupti, magni cum?</p>
<p class="mb-8">@include('partials.ui.button', ['label' => 'Crear categoría', 'url' => route('categories.create')])</p>

<h2 class="text-xl font-bold">Listado</h2>
<ol class="list-decimal ml-8">
  @foreach($categories as $category)
  <li><a href="{{ route('categories.show', $loop->iteration) }}" class="text-blue-500 hover:underline">{{ $category[0] }}</a> ({{ $category[1] }} tareas sin completar | {{ $category[2] }} tareas completadas)</li>
  @endforeach
</ol>
@endsection