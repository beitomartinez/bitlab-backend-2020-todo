<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas por hacer > Ver categoría</title>
</head>
<body>
    <h1>Ver categoría</h1>
    <p>Este es el detalle de la categoría con ID: <?php echo $categoryId ?></p>

    <p><strong>Lo que venía en el campo de descripción es:</strong></p>
    
    <p><a href="{{ route('categories.edit', $categoryId) }}">Actualizar esta categoría</a></p>
</body> 
</html>