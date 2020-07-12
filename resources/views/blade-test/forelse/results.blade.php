<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    <h1>Resultados</h1>
    @forelse ($list as $item)
    <p>La fruta el índice {{ "{$loop->index} es: $item" }}</p>
    @empty
    <p>No hay elementos en el listado :(</p>
    @endforelse

    <p><a href="/blade-test/forelse">Regresar al formulario</a></p>
  </body>
</html>