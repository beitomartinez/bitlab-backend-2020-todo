@extends('layouts.main')

@section('pageTitle', 'Crear categoría')

@section('content')
<h1 class="text-2xl font-bold">Crear categorías</h1>
<p>Completa correctamente el formulario para crear una nueva categoría</p>

@if ($errors->any())
  <div class="my-8 border border-red-500 p-4 text-red-500 text-center">Por favor, completa correctamente el formulario</div>
@endif

<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="mb-2">
    <p>Nombre de la categoría</p>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de categoría" class="border">
    @error('name')
      <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="mb-2">
    <p>Descripción de la categoría</p>
    <textarea name="description" rows="5" class="border">{{ old('description') }}</textarea>
    @error('description')
      <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="mb-2">
    <p>Imagen</p>
    <input type="file" name="image" class="border" accept="image/*">
    @error('image')
      <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-2">
    <p>Color</p>
    <input type="text" name="color" value="{{ old('color') }}" class="border">
    @error('color')
      <div class="text-red-500 text-xs">{{ $message }}</div>
    @enderror
  </div>

  <p class="mt-4"><button class="bg-blue-500 text-white p-2">Guardar</button></p>
</form>
@endsection