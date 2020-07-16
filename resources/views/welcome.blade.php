@extends('layouts.main')

@section('pageTitle', 'Página de inicio')

@section('content')
<h1 class="text-2xl font-bold">Bienvenidos</h1>
<p>Esta es una aplicación web para llevar el control de mis tareas por hacer</p>
<p class="mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur officia tempore id, corrupti labore obcaecati repellat vitae dolorem aperiam ad veritatis voluptas aut delectus molestiae repudiandae? Laborum officiis culpa voluptate. Iusto natus exercitationem expedita ipsa quasi qui aspernatur illo velit, odit repudiandae in eius quaerat, rem error? Sapiente, voluptatibus inventore.</p>

<h2 class="text-xl font-bold mb-2">Accesos directos</h2>
<p class="mb-4">@include('partials.ui.button', ['label' => 'Crear nueva tarea', 'url' => route('tasks.create') ])</p>
<p>@include('partials.ui.button', ['label' => 'Crear nueva categoría', 'url' => route('categories.create') ])</p>

@endsection
