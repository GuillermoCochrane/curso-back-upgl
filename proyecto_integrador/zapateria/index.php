<?php
/* 📌 TRABAJO INTEGRADOR – PHP NIVEL INTERMEDIO
Objetivo:
Crea un ABM que permita agregar-modificar-borrar zapatillas y mostrarlas en una pagina...

📂 El proyecto deberá tener estos archivos:

- header.php
- footer.php
- funciones.php
- ABM_zapatillas.php
- home.php
- index.php
Cada zapatilla tiene que tener:
- Marca
- Modelo
- Color
- Talle
- Precio
- Stock

 */
// require_once __DIR__ . "/src/controllers/mainController.php";
// $datos = datosMainController($zapatillasDB, $marcasDB);
  require_once __DIR__ . "/src/router/router.php";
  require_once __DIR__ . "/src/utilities/render.php";
  render(__DIR__ . "/src/views/templates/main", $datos);
