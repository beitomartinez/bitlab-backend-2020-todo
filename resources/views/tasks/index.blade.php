@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold">Tareas</h1>
<p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aliquid dolorem illum tenetur porro nisi quibusdam, qui reiciendis molestiae distinctio maxime hic blanditiis optio ipsum cupiditate, facere, modi facilis quas?</p>
<p class="mb-8">@include('partials.ui.link', ['label' => 'Crear tarea', 'url' => route('tasks.create')])</p>

<h2 class="text-xl font-bold mb-4">Listado de tareas</h2>

<div class="overflow-hidden">
  <div class="flex flex-row -mx-2">
    <div class="w-1/4 px-2 border-r border-black">
      <p class="font-bold">Buscar tareas</p>

      <form action="{{ route('tasks.index') }}" method="GET">
        <div class="mb-2">
          <p class="mb-1"><label for="keyword" class="form-label">Palabra clave</label></p>
          <input type="text" class="form-input" name="keyword" id="keyword" value="{{ request()->get('keyword') }}">
        </div>

        <div class="mb-2">
          <p><label for="category_id" class="form-label">Categoría</label></p>
          <select name="category_id" id="category_id" class="form-input">
            <option value="">Todas las categorias</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request()->get('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-2">
          <p><label for="level" class="form-label">Nivel de urgencia</label></p>
          <select name="level" id="level" class="form-input">
            <option value="">Todos los niveles</option>
            <option value="0" {{ request()->get('level') == '0' ? 'selected' : '' }}>Normal</option>
            <option value="1" {{ request()->get('level') == '1' ? 'selected' : '' }}>Importante</option>
            <option value="2" {{ request()->get('level') == '2' ? 'selected' : '' }}>Urgente</option>
          </select>
        </div>
        
        <div class="mb-2">
          <p><label for="level" class="form-label">Estado</label></p>
          <select name="state" id="state" class="form-input">
            <option value="">Todos los estados</option>
            <option value="0" {{ request()->get('state') == '0' ? 'selected' : '' }}>Pendiente</option>
            <option value="1" {{ request()->get('state') == '1' ? 'selected' : '' }}>En curso</option>
            <option value="2" {{ request()->get('state') == '2' ? 'selected' : '' }}>Completada</option>
          </select>
        </div>


        <div class="mb-2">
          <p class="mb-1"><label for="starts" class="form-label">Desde</label></p>
          <input type="text" class="form-input datepicker" name="starts" id="starts" value="{{ request()->get('starts') }}">
        </div>
        <div class="mb-2">
          <p class="mb-1"><label for="ends" class="form-label">Hasta</label></p>
          <input type="text" class="form-input datepicker" name="ends" id="ends" value="{{ request()->get('ends') }}">
        </div>



        <div class="text-center my-4">@include('partials.ui.button', ['label' => 'Buscar', 'class' => 'bg-blue-700 hover:bg-blue-800 text-white'])</div>

        <p class="text-sm text-center"><a href="{{ route('tasks.index') }}" class="text-blue-500">Limpiar</a></p>

      </form>

    </div>
    <div class="w-3/4 px-2">
      @if (count($tasks) == 0)
      <p>No encontramos tareas de acuerdo a tu búsqueda</p>
      @else
        @foreach($tasks as $task)
        <div class="rounded p-2 mb-2 border leading-tight">
          <p class="text-xl"><a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:underline">{{ $task->name }}</a></p>
          <p class="text-sm mb-4">Categoría: <span class="font-bold">{{ $task->category->name }}</span> | Estado: <span class="font-bold">{{ $task->getHumanStateAttribute() }}</span> | Urgencia: <span class="font-bold">{{ $task->getHumanLevelAttribute() }}</span> </p>
          <p>{{ $task->description }}</p>
        </div>
        @endforeach
      @endif
    </div>
  </div>
</div>

@endsection