@extends('layouts.main')

@section('pageTitle', $category->name)

@section('content')

@if (session('cat_updated'))
<div class="border border-green-500 p-1 text-center text-green-500">Categoría actualizada con éxito</div>
@endif

<div class="flex flex-row items-center mb-2">
  <div class="w-10 h-10 flex-none mr-2 rounded-full" style="background-color:#{{ $category->color }}"></div>
  <h1 class="text-2xl font-bold flex-1">{{ $category->name }}</h1>
</div>

<p><strong>Descripción:</strong> {{ $category->description }}</p>
<p><strong>Creado el:</strong> {{ $category->created_at->formatLocalized('%b %d, %Y %I:%M %p') }}</p>

<div class="flex flex-row items-center mb-8">
  <div class="flex-none mr-2">
    @include('partials.ui.link', ['label' => 'Actualizar categoría', 'url' => route('categories.edit', $category->id)])
  </div>
  <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="flex-none mr-2" onsubmit="return confirm('¿Realmente quieres eliminar esta categoría?');">
    @csrf
    @method('DELETE')
    @include('partials.ui.button', ['label' => 'Eliminar categoría', 'class' => 'bg-red-700 hover:bg-red-800 text-white'])
  </form>
</div>

<h2 class="text-xl font-bold mb-2">Tareas de esta categoría</h2>
@if (count($category->tasks) == 0)
<p>No hay tareas para esta categoría aún. <a href="{{ route('tasks.create') }}" class="text-blue-500 underline">¿Por qué no creas la primera?</a></p>
@else
<div class="overflow-hidden">
  <div class="flex flex-col md:flex-row flex-wrap -mx-2">
    @foreach ($category->tasks as $task)
    @include('partials.tasks.list-item')
    @endforeach
  </div>
</div>
@endif
@endsection