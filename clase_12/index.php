<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo</title>
</head>
<body>
<!-- Comentario en HTML -->
<h2>Hola Mundo</h2>
<?php
    $variable = "Hola mundo desde php";
    $variable2 = "Hola Mundo 2";
    echo $variable;
    echo "<br>";
    echo "<h2> el valor de la variable es: $variable2</h2>";
    $variable_a = 30 ;
    $variable_b = 20;
    if ($variable_a > $variable_b) {
    echo "<h2>El valor de la variable a es : $variable_a y la variable a es mayor que la variable b que es: $variable_b</h2>";
    } else {
    echo "<h2>El valor de la variable b es : $variable_b y la variable b es mayor que la variable a que es: $variable_a</h2>";
    }
?>
</body>
</html>