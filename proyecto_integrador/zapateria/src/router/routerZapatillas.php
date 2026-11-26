<?php
  require_once __DIR__ . "/../utilities/utilities.php";
  require_once __DIR__ . "/../controllers/zapatillasController.php";

  function procesarPeticion(string $uri): array {
    $metodo = esPost();

    $datos = [];
    $subParametro = obtenerParametro($uri,2);

    if ($metodo !== true){
      $datos = match($subParametro){
        "/"           => datosZapatillas(),
        "/crear"      => datosCrearZapatilla(),
        "/detalle"    => datosZapatilla($_GET["id"] ?? ""),
        "/editar"     => datosEditarZapatilla($_GET["id"] ?? ""),
        "/eliminar"   => datosEliminarZapatilla($_GET["id"] ?? ""),
        default       => datosZapatillas()
      };
    } else {
      $datos = match($subParametro){
        "/crear"    => crearZapatilla(),
        "/editar"   => actualizarZapatilla($_GET["id"] ?? "0"),
        "/eliminar" => eliminarZapatilla($_GET["id"] ?? "0"),
        default     => datosZapatillas()
      };
    };

    return $datos;
  }