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

  @if ($minutes <= 100)
  <p>Tu factura es de <strong>${{ number_format($minutes * 0.45, 2) }}</strong></p>
  @elseif ($minutes <= 200)
  <p>Tu factura es de <strong>${{ number_format($minutes * 0.40, 2) }}</strong></p>
  @elseif ($minutes <= 400)
  <p>Tu factura es de <strong>${{ number_format(($minutes * 0.30) - 5, 2) }}</strong>. Se te aplicó un bono de $5.00</p>
  @else
  <p>Tu factura es de <strong>${{ number_format(($minutes * 0.27) - 10, 2) }}</strong>. Se te aplicó un bono de $10.00</p>
  @endif

  <p><a href="/blade-test/if">Regresar al formulario</a></p>
  
</body>
</html>