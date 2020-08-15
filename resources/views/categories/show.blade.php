@extends('layouts.main')

@section('pageTitle', $category->name)

@section('content')
<h1 class="text-2xl font-bold">{{ $category->name }}</h1>
<p class="mb-2"><strong>Descripción:</strong> {{ $category->description }}</p>
<p class="mb-2"><strong>Color:</strong> #{{ $category->color }}</p>
<p class="mb-8"><strong>Creado el:</strong> {{ $category->created_at->formatLocalized('%b %d, %Y %I:%M %p') }}</p>

<p class="mb-8"><a href="{{ route('categories.edit', $category->id) }}">Actualizar categoría</a></p>

<h2 class="text-xl font-bold mb-4">Tareas de esta categoría:</h2>
<p>Pendiente...</p>
@endsection