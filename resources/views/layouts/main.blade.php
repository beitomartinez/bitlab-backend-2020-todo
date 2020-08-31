<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoApp | @yield('pageTitle', 'Bienvenidos')</title>
    <link href="{{ asset('css/my-tailwind.css') }}" rel="stylesheet">
    <style>
      .form-label {
        text-transform: uppercase;
        font-size: 12px;
        cursor: pointer;
      }

      .form-input {
        background-color: #fff;
        width: 100%;
        padding: 3px;
        border-radius: 3px;
        border: solid 1px #c9c9c9;
      }

      select.form-input {
        appearance: none;
        -webkit-appearance: none;
      }

      .bordered-table td {
        padding: 3px;
        border: solid 1px #c8c8c8;
      }
    </style>
  </head>
  <body>
    <div class="container mx-auto">
      <div class="flex flex-row items-center py-4 mb-4 border-b border-blue-500">
        <div class="flex-1 text-3xl font-bold"><a href="{{ route('home') }}" class="hover:underline">ToDoApp</a></div>
        @guest
          <div class="flex-none mr-4"><a class="text-blue-500 hover:underline" href="{{ route('login') }}">Iniciar sesión</a></div>
          <div class="flex-none mr-4"><a class="text-blue-500 hover:underline" href="{{ route('register') }}">Registrarme</a></div>
        @else
          <div class="flex-none mr-4">Hola, {{ Auth::user()->name }}</div>
          <div class="flex-none mr-4"><a href="{{ route('categories.index') }}" class="text-blue-500 hover:underline">Categorías</a></div>
          <div class="flex-none mr-4"><a href="{{ route('tasks.index') }}" class="text-blue-500 hover:underline">Tareas</a></div>
          <div class="flex-none">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
              <button class="text-blue-500 hover:underline">Cerrar sesión</button>
          </form>
          </div>
        @endguest
      </div>

      @section('content')
      <p>Este es un mensaje de ejemplo</p>
      @show

      <div class="border-t border-blue-500 py-2 mt-8 text-xs">{{ date('Y') }} - Derechos reservados</div>

      @section('scripts')
      @show
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
      flatpickr("#complete_date", { enableTime: true, minDate: 'today' });
      flatpickr(".range-picker", { mode: 'range' });
      flatpickr(".datepicker");
    </script>
  </body>
</html>