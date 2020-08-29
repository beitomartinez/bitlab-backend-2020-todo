@extends('layouts.main')

@section('pageTitle', 'Crear categoría')

@section('content')
<h1 class="text-2xl font-bold">Crear categorías</h1>
<p class="mb-4">Completa correctamente el formulario para crear una nueva categoría</p>

@if ($errors->any())
  <div class="my-8 border border-red-500 p-4 text-red-500 text-center">Por favor, completa correctamente el formulario</div>
@endif

<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="max-w-sm">
  @csrf

  <div class="mb-2">
    <p><label for="name" class="form-label">Nombre de la categoría</label></p>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de categoría" class="form-input">
    @error('name')
      <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="mb-2">
    <p><label for="description" class="form-label">Descripción de la categoría</label></p>
    <textarea name="description" rows="5" class="form-input">{{ old('description') }}</textarea>
    @error('description')
      <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="mb-2">
    <p><label for="image" class="form-label">Imagen</label></p>
    <input type="file" name="image" class="form-input" accept="image/*">
    @error('image')
      <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-2">
    <p><label for="color" class="form-label">Color</label></p>
    <input type="text" name="color" value="{{ old('color') }}" class="form-input">
    @error('color')
    <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
  </div>

  <div class="text-center mt-4">@include('partials.ui.button', ['label' => 'Guardar', 'class' => 'bg-blue-700 hover:bg-blue-800 text-white'])</div>
</form>
@endsection