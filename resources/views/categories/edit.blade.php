<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas por hacer > Editar categoría</title>
</head>
<body>
    <h1>Editar categoría</h1>
    <p>Completa correctamente el formulario para actualizar la categoría, con ID: <?php echo $categoryId ?></p>

    <form action="{{ route('categories.update', $categoryId) }}" method="POST">
      @csrf
      <input type="hidden" name="_method" value="PUT">

      <p>Nombre de la categoría</p>
      <input type="text" name="name">

      <button>Actualizar</button>
    </form>
    
</body> 
</html>