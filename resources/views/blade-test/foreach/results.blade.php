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

  <ul>
    @foreach ($list as $k => $item)
    <li>La fruta el índice {{ "$k es: $item" }}</li>
    @endforeach
  </ul>

  <p><a href="/blade-test/foreach">Regresar al formulario</a></p>
  
</body>
</html>