@extends('layouts.main')

@section('pageTitle', 'Detalle de categoría')

@section('content')
<h1 class="text-2xl font-bold">Ver categoría</h1>
<p>Este es el detalle de la categoría con ID: <?php echo $categoryId ?></p>

<p><strong>Lo que venía en el campo de descripción es:</strong></p>

<p><a href="{{ route('categories.edit', $categoryId) }}">Actualizar esta categoría</a></p>
@endsection