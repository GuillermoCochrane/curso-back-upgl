<?php
  define('BASE_PATH', '/proyecto_integrador/zapateria');
  require_once __DIR__ . "/src/router/router.php";
  require_once __DIR__ . "/src/utilities/render.php";
  render(__DIR__ . "/src/views/templates/main", $datos);
