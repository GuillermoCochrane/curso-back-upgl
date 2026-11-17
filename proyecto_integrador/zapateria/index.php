<?php
  // 1. Configuración global del proyecto
  define('BASE_PATH', '/proyecto_integrador/zapateria');
  define('DB_ZAPATILLAS', __DIR__ . '/src/data/zapatillas.json');
  define('DB_MARCAS', __DIR__ . '/src/data/marcas.json');

  // 2. Cargamos las dependencias base
  require_once __DIR__ . "/src/repositories/JsonRepository.php";
  require_once __DIR__ . "/src/router/router.php";
  require_once __DIR__ . "/src/utilities/render.php";
  
  // 3. Renderizamos
  render(__DIR__ . "/src/views/templates/main", $datos);