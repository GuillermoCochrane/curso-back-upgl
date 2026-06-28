<?php
//Esto es un comentario
#De esta otra
/*
O de esta otra
que te deja multiples lineas
NO LO EJECUTA PHP
*/
$saludo = "Hola Mundo";

$nombre = "Gaspar";
$edad = readline("Ingrese su edad a continuación:");

echo "<br>$saludo , $nombre <br>";
if ($edad >= 18){
    echo "\n Es mayor de edad, tiene $edad años";
}else{
    echo "\n Es menor de edad tiene $edad años";
};
?>
