<div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2">
  <div class="border border-gray-500 rounded-lg p-4">
    <p class="font-bold"><a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:underline">{{ $task->name }}</a></p>
    <div class="leading-tight text-sm">
      <p>{{ $task->description }}</p>
      <p class="text-xs"><span class="font-bold">Creada el:</span> {{ $task->created_at->format('Y-m-d') }}</p>
      <p class="text-xs {{ ($task->isDueSoon() || $task->isPastDue()) ? 'text-red-700' : '' }}"><span class="font-bold">Se debe completar:</span> {{ $task->complete_date->format('Y-m-d') }}</p>
      <p class="text-xs"><span class="font-bold">Urgencia:</span> {{ $task->getHumanLevelAttribute() }}</p>
      <p class="text-xs"><span class="font-bold">Estado:</span> {{ $task->getHumanStateAttribute() }}</p>
    </div>
  </div>
</div>