@extends('layouts.main')

@section('pageTitle', 'Crear categoría')

@section('content')
<h1 class="text-2xl font-bold">Crear categorías</h1>
<p>Completa correctamente el formulario para crear una nueva categoría</p>

<?php
if (session('error')) {
  echo '<p><strong>Por fafvor, llena correctamente el formulario</strong></p>';
}
?>

<form action="{{ route('categories.store') }}" method="POST">
  @csrf

  <p>Nombre de la categoría</p>
  <input type="text" name="name" value="<?php echo old('name') ?>" placeholder="Nombre de categoría" class="border">
  
  <p>Descripción de la categoría</p>
  <textarea name="description" rows="5" class="border"><?php echo old('description') ?></textarea>
  
  <p>Color</p>
  <input type="text" name="color" value="<?php echo old('color') ?>" class="border">

  <p class="mt-4"><button class="bg-blue-500 text-white p-2">Guardar</button></p>
</form>
@endsection