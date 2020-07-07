<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas por hacer > Crear categorías</title>
</head>
<body>
    <h1>Crear categorías</h1>
    <p>Completa correctamente el formulario para crear una nueva categoría</p>
    <form action="{{ route('categories.store') }}" method="POST">
      @csrf

      <p>Nombre de la categoría</p>
      <input type="text" name="name">

      <button>Guardar</button>
    </form>
</body>
</html>