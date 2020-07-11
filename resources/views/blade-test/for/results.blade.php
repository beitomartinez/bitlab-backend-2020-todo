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

  @for ($i = 1; $i <= 10; $i++)
  <p>{{ $number }} x {{ $i }} equivale a: <strong>{{ $i * $number }}</strong></p>
  @endfor

  <p><a href="/blade-test/for">Regresar al formulario</a></p>
  
</body>
</html>