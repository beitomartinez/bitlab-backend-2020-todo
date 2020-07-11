<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="/blade-test/if/form" method="POST">
    @csrf
    <p>Ingresa el total de tus minutos:</p>
    <p><input type="text" name="minutes"></p>
    <button>Enviar</button>
  </form>
</body>
</html>