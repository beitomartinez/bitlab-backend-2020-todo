@extends('layouts.main')

@section('pageTitle', $category['name'])

@section('content')
<h1 class="text-2xl font-bold">{{ $category['name'] }}</h1>
<p class="mb-2">{{ $category['description'] }} | <span class="text-xs">Creada el {{ $category['created_at'] }}</span></p>
<p class="text-gray-700 text-xs mb-8">Total de tareas: {{ $category['tasks_total'] }} | Tareas completadas: {{ $category['tasks_completed'] }} | Tareas no completadas: {{ $category['tasks_uncompleted'] }}</p>

<h2 class="text-xl font-bold mb-4">Tareas de esta categoría:</h2>
<ul class="list-disc ml-8 text-sm">
  @foreach($tasks as $task)
  <li><a href="{{ route('tasks.show', 1) }}" class="text-blue-500 hover:underline">{{ $task }}</a></li>
  @endforeach
</ul>
@endsection