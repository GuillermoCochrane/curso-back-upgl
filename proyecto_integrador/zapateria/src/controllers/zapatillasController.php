<?php
  declare(strict_types=1);

  function datosZapatillas(): array {
    return [
      "zapatillas" => cargarDatos(DB_ZAPATILLAS),
      "marcas" => cargarDatos(DB_MARCAS),
      "template" => "zapatillas",
      "scripts" => "zapatillas"
    ];
  }