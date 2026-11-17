<?php
  declare(strict_types=1);

  function datosMainController(): array {
    return [
      "zapatillas" => cargarDatos(DB_ZAPATILLAS),
      "marcas" => cargarDatos(DB_MARCAS),
      "template" => "home",
      "scripts" => "home"
    ];
  }