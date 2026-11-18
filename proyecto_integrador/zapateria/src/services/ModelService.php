<?php
  declare(strict_types=1);

  function procesarZapatilla(array $entrada): array {
      return [
        "id"          => 0,
        "slug"        => "",
        "marca_id"    => (int) ($entrada["marcaID"] ?? 0),
        "nombre"      => $entrada["nombre"] ?? "",
        "precio"      => (int) ($entrada["precio"] ?? 0),
        "stock"       => (int) ($entrada["stock"] ?? 0),
        "descripcion" => $entrada["descripcion"] ?? "",
        "talles"      => isset($entrada["talles"]) ? [$entrada["talles"]] : [],
        "colores"     => isset($entrada["colores"]) ? [$entrada["colores"]] : [],
        "imagen"      => $entrada["imagen"] ?? "",
      ];
  }