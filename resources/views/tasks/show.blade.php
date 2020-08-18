@extends('layouts.main')

@section('pageTitle', $task->name)

@section('content')

<h1 class="text-2xl font-bold">{{ $task->name }}</h1>
<p class="mb-2"><strong>Descripción:</strong> {{ $task->description }}</p>
<p class="mb-2"><strong>Nivel:</strong> {{ $task->humanLevel }}</p>
<p class="mb-2"><strong>Estado:</strong> {{ $task->humanState }}</p>
<p class="mb-2"><strong>La quiero cumplir para:</strong> {{ $task->complete_date->formatLocalized('%b %d, %Y %I:%M %p') }}</p>
@if ($task->state == 2)
<p class="mb-2"><strong>Se completó el:</strong> {{ $task->completed_at }}</p>
@endif

<p class="mb-2"><strong>Categoría:</strong> {{ $category->name }}</p>
<p class="mb-2"><strong>Creado:</strong> {{ $user->name }}</p>

@endsection