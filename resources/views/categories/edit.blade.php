@extends('layouts.main')

@section('pageTitle', 'Página de inicio')

@section('content')
<h1 class="text-2xl font-bold">Editar categoría</h1>
<p>Completa correctamente el formulario para actualizar la categoría</p>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
  @csrf
  <input type="hidden" name="_method" value="PUT">

  <p>Nombre de la categoría</p>
  <input type="text" name="name" value="{{ $category->name }}" placeholder="Nombre de categoría" class="border">
  
  <p>Descripción de la categoría</p>
  <textarea name="description" rows="5" class="border">{{ $category->description }}</textarea>
  
  <p>Color</p>
  <input type="text" name="color" value="{{ $category->color }}" class="border">
  
  <p class="mt-4"><button class="bg-blue-500 text-white p-2">Actualizar</button></p>
</form>
@endsection