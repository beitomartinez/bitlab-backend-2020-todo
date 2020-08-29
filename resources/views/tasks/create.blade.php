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
    <p><label for="name" class="form-label">Nombre de la tarea</label></p>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de tarea" class="form-input">
  </div>
  
  <div class="mb-2">
    <p><label for="description" class="form-label">Descripción de la tarea</label></p>
    <textarea name="description" rows="5" class="form-input">{{ old('description') }}</textarea>
  </div>
  
  <div class="mb-2">
    <p><label for="category_id" class="form-label">Categoría de la tarea</label></p>
    <select name="category_id" id="category_id" class="form-input">
      <option value="">-Selecciona una categoría-</option>
      @foreach ($categories as $category)
      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
 
  <div class="mb-2">
    <p><label for="level" class="form-label">Nivel de urgencia</label></p>
    <select name="level" id="level" class="form-input">
      <option value="0">Normal</option>
      <option value="1">Importante</option>
      <option value="2">Urgente</option>
    </select>
  </div>

  <div class="mb-2">
    <p><label for="complete_date" class="form-label">Debo completarla para el</label></p>
    <input type="text" name="complete_date" id="complete_date" value="<?php echo old('complete_date') ?>" placeholder="Selecciona fecha y hora" class="form-input">
  </div>

  <div class="text-center mt-4">@include('partials.ui.button', ['label' => 'Guardar', 'class' => 'bg-blue-700 hover:bg-blue-800 text-white'])</div>
</form>
@endsection