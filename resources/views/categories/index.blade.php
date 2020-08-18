@extends('layouts.main')

@section('pageTitle', 'Índice de categorías')

@section('content')

@if (session('cat_stored'))
<div class="border border-green-500 p-1 text-center text-green-500">Categoría almacenada con éxito</div>
@endif

@if (session('cat_destroyed'))
<div class="border border-red-700 p-1 text-center text-red-700">Categoría eliminada con éxito</div>
@endif

<h1 class="text-2xl font-bold">Índice de categorías</h1>
<p class="mb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat ab quidem maxime? Corrupti, magni cum?</p>
<p class="mb-8">@include('partials.ui.button', ['label' => 'Crear categoría', 'url' => route('categories.create')])</p>

<h2 class="text-xl font-bold">Listado</h2>
@if (count($categories) == 0)
<p>No hay categorías aún</p>
@else

<div class="flex flex-row flex-wrap text-center">
  @foreach($categories as $category)
  <div class="w-1/2 md:w-1/3 lg:w-1/4 p-2 border">
    @if (!is_null($category->image))
    <img src="{{ asset("storage/categories-images/{$category->image}") }}" class="mb-4">
    @endif
    <a href="{{ route('categories.show', $category->id) }}" class="text-blue-500 hover:underline">{{ $category->name }}</a>
  </div>
  @endforeach
</div>
@endif
@endsection