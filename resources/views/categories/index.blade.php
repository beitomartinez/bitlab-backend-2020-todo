<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas por hacer > Índice de categorías</title>
</head>
<body>
    <h1>Índice de categorías</h1>
    <p>Aquí se va a mostrar el índice de categorías... algún día</p>
    <p><a href="{{ route('categories.create') }}">Crear categoría</a></p>
    
    <hr>
    <h2>Listado</h2>
    <p><a href="{{ route('categories.show', 1) }}">Ver categoría con ID: 1</a></p>
    <p><a href="{{ route('categories.show', 2) }}">Ver categoría con ID: 2</a></p>
    <p><a href="{{ route('categories.show', 3) }}">Ver categoría con ID: 3</a></p>
    <p><a href="{{ route('categories.show', 4) }}">Ver categoría con ID: 4</a></p>
    <p><a href="{{ route('categories.show', 5) }}">Ver categoría con ID: 5</a></p>
</body>
</html>