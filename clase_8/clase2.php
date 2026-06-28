<?php 
// comentarios
# otro tipo de comentario
/* comentarios multilinea */
echo "hola mundo";
$saludo = "otro hola mundo";
echo $saludo;
echo $saludo." , con string concatenado";
$nombre = "Juan";
$edad = 20;

$edad_ingresada = readline("Ingrese su edad: ");

echo "Hola $nombre, tu edad es $edad";
if ($edad_ingresada > $edad) {
    echo "la edad que ingresaste es mayor a la de $nombre";
} elseif ($edad_ingresada < $edad) {
    echo "la edad que ingresaste es menor a la de $nombre";
} else {
    echo "la edad que ingresaste es igual a la de $nombre";
}