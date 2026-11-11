<?php
/* 📌 TRABAJO INTEGRADOR – PHP NIVEL INTERMEDIO
Objetivo:
Crea un ABM que permita agregar-modificar-borrar zapatillas y mostrarlas en una pagina...

📂 El proyecto deberá tener estos archivos:

- header.php
- footer.php
- funciones.php
- ABM_zapatillas.php
- tienda_de_zapatillas.php
- index.php
Cada zapatilla tiene que tener:
- Marca
- Modelo
- Color
- Talle
- Precio
- Stock

 */
require_once __DIR__ . "/src/data/zapatillas.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php include_once __DIR__ ."/src/views/components/shared/head/head.php" ?>
<?php include_once __DIR__ ."/src/views/components/shared/nav/navbar.php"; ?>
<?php include_once __DIR__ ."/src/views/pages/tienda_de_zapatillas.php"; ?>
<?php include_once __DIR__ ."/src/views/components/shared/footer/footer.php"; ?>

</html>