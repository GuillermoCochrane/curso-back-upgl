<?php
  declare(strict_types=1);

  require_once __DIR__ . '/../repositories/JsonRepository.php';
  require_once __DIR__ . "/../utilities/utilities.php";
  require_once __DIR__ . "/ModelService.php";

  // Funciones de Carga de datos nuevos
  function agregarEntrada(array $entrada, string $entidad, string $DB): int {
    // 1. Cargamos la DB una sola vez
    $datos = cargarDatos($DB);
    
    // 2. Mapeamos los datos del formulario
    $nuevosDatos = modelHandler($entrada, $entidad);

    // 3. Generamos los datos del sistema (ID y Slug)
    $nuevoId = generarID($datos);
    $nuevoSlug = generarSlug($nuevosDatos["nombre"]);

    // 4. Inyectamos y guardamos
    $nuevosDatos["id"] = $nuevoId;
    $nuevosDatos["slug"] = $nuevoSlug;
    $datos[] = $nuevosDatos;
    guardarDatos($DB, $datos); 

    // 5. Devolvemos el ID
    return $nuevoId; 
  }