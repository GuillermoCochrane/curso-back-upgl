<?php
$precioArticulo = 0;
$montoTotal = 0;
$envioGratis = "no";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $montoTotal = $_POST["montoFinal"];
  echo "El monto total es: $montoTotal <br>";
  if ($montoTotal >= 35000) {
    $envioGratis = "si";
    echo "El envio es gratis<br>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>calculadora de envios</title>
</head>
<body>
  <form action="index.php" method="post">
    <input type="number" name="montoFinal" placeholder="Ingrese el monto total">
    <button>Chequear envio</button>
  </form>
</body>
</html>