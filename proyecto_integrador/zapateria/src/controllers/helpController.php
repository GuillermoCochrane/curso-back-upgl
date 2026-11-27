<?php
  declare(strict_types=1);

  require_once __DIR__ . "/../repositories/JsonRepository.php";

  function datosHelpController(string $title): array {
    return [
      "marcas" => cargarDatos(DB_MARCAS),
      "template" => "help",
      "title" => $title
    ];
  }