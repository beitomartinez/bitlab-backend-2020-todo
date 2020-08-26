@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold">Tareas</h1>
<p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aliquid dolorem illum tenetur porro nisi quibusdam, qui reiciendis molestiae distinctio maxime hic blanditiis optio ipsum cupiditate, facere, modi facilis quas?</p>
<p class="mb-8">@include('partials.ui.link', ['label' => 'Crear tarea', 'url' => route('tasks.create')])</p>

<h2 class="text-xl font-bold">Listado de tareas</h2>
@if (count($tasks) == 0)
<p>No hay tareas aún</p>
@else
<ol class="list-decimal ml-8">
  @foreach($tasks as $task)
  <li><a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:underline">{{ $task->name }}</a></li>
  @endforeach
</ol>
@endif
@endsection