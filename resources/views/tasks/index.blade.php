@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold">Listado de tareas</h1>
<div class="flex flex-row">
  <div class="w-2/3">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aliquid dolorem illum tenetur porro nisi quibusdam, qui reiciendis molestiae distinctio maxime hic blanditiis optio ipsum cupiditate, facere, modi facilis quas?</p>

    <h2 class="mt-4 font-bold text-xl">Módulos del curso</h2>

    @component('partials.module', ['title' => 'Módulo 3: Blade'])
    @slot('duration')
    <p class=""><span class="text-red-500"><span class="font-bold">Duración:</span> 4 semanas</span></p>
    <p class="mb-4 text-xs">Duración del curso puede cambiar sin previo aviso</p>
    @endslot
    @endcomponent
    
  </div>

  <div class="w-1/3 p-2">
    @include('partials.tasks.pending', ['message' => 'Antes de crear más tareas, finaliza estas:'])
  </div>
</div>
@endsection