@extends('layouts.main')

@section('pageTitle', 'Página de inicio')

@section('content')
<h1 class="text-2xl font-bold">Editar categoría</h1>
<p>Completa correctamente el formulario para actualizar la categoría, con ID: <?php echo $categoryId ?></p>

<form action="{{ route('categories.update', $categoryId) }}" method="POST">
  @csrf
  <input type="hidden" name="_method" value="PUT">

  <p>Nombre de la categoría</p>
  <input type="text" name="name">

  <button>Actualizar</button>
</form>
@endsection