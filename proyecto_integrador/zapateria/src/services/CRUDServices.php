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

  function buscarPorId(array $datos, int $id): array {
    if ($id <= 0) {
      return [];
    }

    foreach ($datos as $dato) {
      if ((int) $dato['id'] === $id) {
        return $dato;
      }
    }

    return [];
  }

  function actualizarEntrada(int $id, array $datosNuevos, string $archivo): void {
    $datos = cargarDatos($archivo);
    $encontrado = false; 

    foreach ($datos as &$dato) {
      if ((int)$dato['id'] === $id) {
        $dato['marca_id']    = $datosNuevos['marca_id'];
        $dato['nombre']      = $datosNuevos['nombre'];
        $dato['precio']      = $datosNuevos['precio'];
        $dato['stock']       = $datosNuevos['stock'];
        $dato['descripcion'] = $datosNuevos['descripcion'];
        $dato['talles']      = $datosNuevos['talles'];
        $dato['colores']     = $datosNuevos['colores'];
        $dato['imagen']      = $datosNuevos['imagen'];
        $dato["slug"]        = generarSlug($datosNuevos["nombre"]);

        $encontrado = true;
        break;
      }
    }
    unset($dato);
    
    // Solo guardamos si realmente se modificó algo
    if ($encontrado) {
        guardarDatos($archivo, $datos);
    }
  }