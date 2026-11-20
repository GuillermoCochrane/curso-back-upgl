<?php
  require_once __DIR__ . "/../utilities/utilities.php";
  require_once __DIR__ . "/../controllers/zapatillasController.php";

  function procesarPeticion(string $uri): array {
    $metodo = esPost();

    $datos = [];
    $subParametro = obtenerParametro($uri,2);

    if ($metodo !== true){
      $datos = match($subParametro){
        '/'        => datosZapatillas(),
        '/crear'   => datosCrearZapatilla(),
        '/detalle' => datosZapatilla($_GET['id'] ?? ''),
        default    => datosZapatillas()
      };
    } else {
      $datos = [];
    };

    return $datos;
  }