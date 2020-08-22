@extends('layouts.main')

@section('pageTitle', $category->name)

@section('content')

@if (session('cat_updated'))
<div class="border border-green-500 p-1 text-center text-green-500">Categoría actualizada con éxito</div>
@endif

<h1 class="text-2xl font-bold">{{ $category->name }}</h1>
<p class="mb-2"><strong>Descripción:</strong> {{ $category->description }}</p>
<p class="mb-8"><a href="{{ route('categories.show', $category->id) }}" class="text-blue-500 underline">Ver detalle de categoría</a></p>

<h2 class="text-xl font-bold mb-4">Tareas completadas:</h2>
<ul class="list-disc ml-6">
  @foreach ($category->completedTasks as $task)
  <li><a href="{{ route('tasks.show', $task->id) }}" class="underline text-blue-500">{{ $task->name }}</a> ({{ $task->user->name }})</li>
  @endforeach
</ul>
@endsection