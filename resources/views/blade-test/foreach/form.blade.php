<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="/blade-test/foreach/form" method="POST">
    @csrf
    <p>Selecciona la lista que deseas desplegar:</p>
    
    <p><select name="list">
      <option value="fruits">Frutas</option>
      <option value="vowels">Vocales</option>
      <option value="foods">Comidas</option>
    </select></p>
    
    <button>Enviar</button>
  </form>
</body>
</html>