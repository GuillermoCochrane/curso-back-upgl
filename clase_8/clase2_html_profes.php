<?php
$precioArticulo;
$montoTotal;
$envioGratis = 49900;
$costoEnvio = 19900;

//el envio gratis es a partir de los $35000!!
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $montoTotal = $_POST["montoFinal"];
    $nombreCliente = $_POST["nombre"];
    //var_dump($_POST);//Muestra los valores que tiene el metodo POST
    echo "Hola $nombreCliente, El monto total enviado es: $montoTotal";
    if($montoTotal >= $envioGratis){
        echo "<h1>Tienes envio gratis!!</h1>";
    }else{
        $montoEnvio = $montoTotal + $costoEnvio;
        echo "<h1>El monto Total con envio es $montoEnvio";
        $diferenciaEnvio = $envioGratis - $montoTotal;
        echo "<h2>Te faltaron: $diferenciaEnvio para llegar al envio gratis!! </h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de Envios</title>
</head>
<body>
    <form action="clase2_html.php" method="POST">
        <br>
        <input type="text" placeholder="Escriba su nombre" name="nombre" id="nombre">
        <br>
        <input type="number" placeholder="Escriba su monto Final" name="montoFinal" id="montoFinal">
    <br>
    <button type="submit">
        Checkear Envio
        </button>
    </form>
    <small>Recordá que el costo del envio es: <?php echo $costoEnvio;?>, pero si gastas mas de: <?php echo $envioGratis; ?> , el envio es gratis! </small>
</body>
</html>
