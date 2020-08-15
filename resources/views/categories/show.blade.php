@extends('layouts.main')

@section('pageTitle', $category->name)

@section('content')

@if (session('cat_updated'))
<div class="border border-green-500 p-1 text-center text-green-500">Categoría actualizada con éxito</div>
@endif

<h1 class="text-2xl font-bold">{{ $category->name }}</h1>
<p class="mb-2"><strong>Descripción:</strong> {{ $category->description }}</p>
<p class="mb-2"><strong>Color:</strong> #{{ $category->color }}</p>
<p class="mb-8"><strong>Creado el:</strong> {{ $category->created_at->formatLocalized('%b %d, %Y %I:%M %p') }}</p>

<p class="mb-8"><a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 underline">Actualizar categoría</a></p>

<form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="mb-4" onsubmit="return confirm('¿Realmente quieres eliminar esta categoría?');">
  @csrf
  @method('DELETE')
  <button class="bg-red-700 text-white p-2">Eliminar categoría</button>
</form>

<h2 class="text-xl font-bold mb-4">Tareas de esta categoría:</h2>
<p>Pendiente...</p>
@endsection