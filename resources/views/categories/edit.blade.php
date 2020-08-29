@extends('layouts.main')

@section('pageTitle', 'Página de inicio')

@section('content')
<h1 class="text-2xl font-bold">Editar categoría</h1>
<p class="mb-4">Completa correctamente el formulario para actualizar la categoría</p>

<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="max-w-sm">
  @csrf
  <input type="hidden" name="_method" value="PUT">

  <div class="mb-2">
    <p><label for="name" class="form-label">Nombre de la categoría</label></p>
    <input type="text" name="name" value="{{ $category->name }}" placeholder="Nombre de categoría" class="form-input">
  </div>
  
  <div class="mb-2">
    <p><label for="description" class="form-label">Descripción de la categoría</label></p>
    <textarea name="description" rows="5" class="form-input">{{ $category->description }}</textarea>
  </div>

  <div class="mb-2">
    <p><label for="image" class="form-label">Imagen</label></p>
    <input type="file" name="image" class="form-input" accept="image/*">
  </div>
  
  <div class="mb-2">
    <p><label for="color" class="form-label">Color</label></p>
    <input type="text" name="color" value="{{ $category->color }}" class="form-input">
  </div>
  
  <div class="text-center mt-4">@include('partials.ui.button', ['label' => 'Actualizar', 'class' => 'bg-blue-700 hover:bg-blue-800 text-white'])</div>
</form>
@endsection