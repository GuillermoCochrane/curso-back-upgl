<?php
/* 📌 TRABAJO INTEGRADOR – PHP NIVEL INTERMEDIO
Objetivo:
Crea un ABM que permita agregar-modificar-borrar zapatillas y mostrarlas en una pagina...

📂 El proyecto deberá tener estos archivos:

- header.php
- footer.php
- funciones.php
- ABM_zapatillas.php
- tienda_de_zapatillas.php(PODEMOS usar el del año pasado)
- index.php
Cada zapatilla tiene que tener:
- Marca
- Modelo
- Color
- Talle
- Precio
- Stock

 */
$marca1 = "Nike";
$marca2 = "Adidas";
$marca3 = "Puma";
$marca4 = "Reebok";

?>
<!DOCTYPE html>
<html lang="es">
<?php include_once("components/header.php"); ?>
<?php include_once("components/navbar.php"); ?>
<?php include_once("ABM_zapatillas.php"); ?>
<?php include_once("components/footer.php"); ?>

</html>