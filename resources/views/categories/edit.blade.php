@extends('layouts.main')

@section('pageTitle', 'Página de inicio')

@section('content')
<h1 class="text-2xl font-bold">Editar categoría</h1>
<p>Completa correctamente el formulario para actualizar la categoría</p>

<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="_method" value="PUT">

  <div class="mb-2">
    <p>Nombre de la categoría</p>
    <input type="text" name="name" value="{{ $category->name }}" placeholder="Nombre de categoría" class="border">
  </div>
  
  <div class="mb-2">
    <p>Descripción de la categoría</p>
    <textarea name="description" rows="5" class="border">{{ $category->description }}</textarea>
  </div>

  <div class="mb-2">
    <p>Imagen</p>
    <input type="file" name="image" class="border" accept="image/*">
  </div>
  
  <div class="mb-2">
    <p>Color</p>
    <input type="text" name="color" value="{{ $category->color }}" class="border">
  </div>
  
  <p class="mt-4"><button class="bg-blue-500 text-white p-2">Actualizar</button></p>
</form>
@endsection