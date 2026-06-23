<?php
//Esto es PHP!!
/*
Comentario
En Bloque
*/
$nombre = "Somos todos";
$saludo =
"<div id='holamundo'>
<h1>Hola Mundo</h1>
<h3>Hola $nombre </h3>
</div>";

echo $saludo;
//Quiero que por CONSOLA(console.log()) del navegador me muestre el saludo.
$consola = 
"<script>
console.log('Hola Mundo x consola, $nombre');
</script>";

echo $consola;
$cualquiercosa = 'Cambio CUALQUIER COSA';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>Hola estoy afuera!<?php echo $nombre;?></h5>
    <script>
        alert("Tu nombre es:<?php 
                    echo $nombre;
                ?>");

    </script>
    <h5>el echo es una masa, imprime cualquier cosa miren: <?php echo $cualquiercosa; ?></h5>
</body>
</html>