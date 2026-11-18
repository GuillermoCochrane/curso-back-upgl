<?php
  declare(strict_types=1);

  require_once __DIR__ . '/../repositories/JsonRepository.php';
  require_once __DIR__ . "/../utilities/utilities.php";
  require_once __DIR__ . "/ModelService.php";

  // Funciones de Carga de datos nuevos
  function agregarEntrada(string $archivo, array $datos, array $entrada, string $entidad): array {
    
    // 1. Procesamos los datos del formulario (Mapeo)
    $nuevosDatos = modelHandler($entrada, $entidad);

    // 2. Generamos los datos del sistema (ID y Slug)
    $nuevoId = generarID($datos);
    $nuevoSlug = generarSlug($nuevosDatos["nombre"]); // Usamos el nombre ya procesado

    // 3. Inyectamos los datos del sistema
    $nuevosDatos["id"] = $nuevoId;
    $nuevosDatos["slug"] = $nuevoSlug;
  
    // 4. Agregamos y guardamos
    $datos[] = $nuevosDatos;
    guardarDatos($archivo, $datos); 

    // 5. Devolvemos el mensaje dinámico
    return ["datos" => $datos, "mensaje" => "$entidad agregada."]; 
  }