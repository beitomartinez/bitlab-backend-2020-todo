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
<p class="mb-8">@include('partials.ui.link', ['label' => 'Crear categoría', 'url' => route('categories.create')])</p>

<h2 class="text-xl font-bold">Listado</h2>
@if (count($categories) == 0)
<p>No hay categorías aún</p>
@else

<table class="w-full bordered-table">
  <tr>
    <td class="font-bold" colspan="2">Categoría</td>
    <td class="font-bold text-center">No. de tareas pendientes</td>
    <td class="font-bold text-center">No. de tareas en curso</td>
    <td class="font-bold text-center">No. de tareas completadas</td>
    <td class="font-bold text-center">Total de tareas</td>
  </tr>
  @foreach($categories as $category)
  <tr>
    <td class="w-20"><a href="{{ route('categories.show', $category->id) }}" class="text-blue-500 hover:underline"><img src="{{ asset("storage/categories-images/{$category->image}") }}"></a></td>
    <td><a href="{{ route('categories.show', $category->id) }}" class="text-blue-500 hover:underline">{{ $category->name }}</a></td>
    <td class="text-center">{{ $category->pending_tasks_count }}</td>
    <td class="text-center">{{ $category->processing_tasks_count }}</td>
    <td class="text-center">{{ $category->completed_tasks_count }}</td>
    <td class="text-center">{{ $category->tasks_count }}</td>
  </tr>
  @endforeach
</table>
@endif
@endsection