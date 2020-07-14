@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold">Listado de tareas</h1>
<div class="flex flex-row">
  <div class="w-2/3">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aliquid dolorem illum tenetur porro nisi quibusdam, qui reiciendis molestiae distinctio maxime hic blanditiis optio ipsum cupiditate, facere, modi facilis quas?</p>
  </div>
  <div class="w-1/3 p-2">
    @include('partials.tasks.pending', ['message' => 'Antes de crear más tareas, finaliza estas:'])
  </div>
</div>
@endsection