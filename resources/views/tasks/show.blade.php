@extends('layouts.main')

@section('pageTitle', $task->name)

@section('content')

@if (session('task_updated'))
<div class="border border-green-500 p-1 text-center text-green-500">Tarea actualizada con éxito</div>
@endif

<h1 class="text-2xl font-bold">{{ $task->name }}</h1>
<p><strong>Descripción:</strong> {{ $task->description }}<br>
<strong>Nivel:</strong> {{ $task->humanLevel }}<br>
<strong>Estado:</strong> {{ $task->humanState }}<br>
<strong>La quiero cumplir para:</strong> {{ $task->complete_date->formatLocalized('%b %d, %Y %I:%M %p') }}</p>
@if ($task->state == 2)
<p class="mb-2"><strong>Se completó el:</strong> {{ $task->completed_at }}</p>
@endif

<p class="mb-2"><strong>Categoría:</strong> <a href="{{ route('categories.show', $task->category->id) }}" class="underline text-blue-500">{{ $task->category->name }}</a></p>

@if ($task->state < 2)
<form action="{{ route('tasks.update', $task->id) }}" class="mt-4" method="POST">
  @csrf
  @method('PUT')

  @if ($task->state == 0)
  <button class="bg-green-500 text-white py-1 px-2 rounded">Marcar como "En curso"</button>
  @else
  <button class="bg-green-500 text-white py-1 px-2 rounded">Marcar como "Completada"</button>
  @endif
</form>
@endif

@endsection