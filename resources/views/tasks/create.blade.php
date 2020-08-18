@extends('layouts.main')

@section('pageTitle', 'Crear categoría')

@section('content')
<h1 class="text-2xl font-bold">Crear tarea</h1>
<p>Completa correctamente el formulario para crear una nueva tarea</p>

@if (session('error')) 
  <p><strong>Por fafvor, llena correctamente el formulario</strong></p>
@endif

<form action="{{ route('tasks.store') }}" method="POST" class="max-w-sm">
  @csrf

  <div class="mb-2">
    <p>Nombre de la tarea</p>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de tarea" class="border">
  </div>
  
  <div class="mb-2">
    <p>Descripción de la tarea</p>
    <textarea name="description" rows="5" class="border">{{ old('description') }}</textarea>
  </div>
  
  <div class="mb-2">
    <p>Categoría de la tarea</p>
    <select name="category_id" id="category_id" class="w-full">
      <option value="">-Selecciona una categoría-</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
 
  <div class="mb-2">
    <p>Nivel de urgencia</p>
    <select name="level" id="level" class="w-full">
      <option value="0">Normal</option>
      <option value="1">Importante</option>
      <option value="2">Urgente</option>
    </select>
  </div>

  <div class="mb-2">
    <p>Debo completarla para el</p>
    <input type="text" name="complete_date" id="complete_date" value="<?php echo old('complete_date') ?>" placeholder="Selecciona fecha y hora" class="border">
  </div>

  <p class="mt-4"><button class="bg-blue-500 text-white p-2">Guardar</button></p>
</form>
@endsection