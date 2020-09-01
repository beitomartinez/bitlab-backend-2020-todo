@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold">Bienvenidos</h1>
<div class="flex flex-col md:flex-row">
  <div class="flex-1 md:mr-4">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus enim amet doloremque architecto hic veniam alias voluptas laborum minima ad impedit quod ipsum officia, voluptate iure aperiam possimus rem eum atque excepturi nesciunt sint itaque perferendis. Sint, error quis ipsa vitae velit provident voluptatum eos obcaecati eveniet doloremque magnam tempore?</p>
  </div>
  <div class="w-1/4 border-l border-black px-2">
    <p class="font-bold">Próximas tareas</p>
    @if (count($tasks) == 0)
    <p>No hay tareas próximas.</p>
    @else
      @foreach ($tasks as $task)
      <p class="mb-1"><a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 underline">{{ $task->name }}</a></p>
      @endforeach
    @endif
  </div>
</div>
@endsection
