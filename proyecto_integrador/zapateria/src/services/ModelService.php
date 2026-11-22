<?php
  declare(strict_types=1);

  function modelHandler(array $entrada, string $entidad): array {
    $datosProcesados = match ($entidad) {
      "zapatillas"  => procesarZapatilla($entrada),
      default       => [],
    };
    return $datosProcesados;
  }

  function procesarZapatilla(array $entrada): array {
      return [
        "id"          => 0,
        "slug"        => "",
        "marca_id"    => $entrada["marcaID"],
        "nombre"      => $entrada["nombre"],
        "precio"      => $entrada["precio"],
        "stock"       => $entrada["stock"],
        "descripcion" => $entrada["descripcion"],
        "talles"      => [$entrada["talles"]],
        "colores"     => [$entrada["colores"]],
        "imagen"      => $entrada["imagen"],
      ];
  }