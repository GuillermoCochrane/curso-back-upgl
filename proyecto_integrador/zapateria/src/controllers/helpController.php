<?php
  declare(strict_types=1); // Setea tipado fuerte para todo el archivo

  require_once __DIR__ . "/../repositories/JsonRepository.php";
  $zapatillasDB = __DIR__ . "/../data/zapatillas.json";
  $marcasDB = __DIR__ . "/../data/marcas.json";

  function datosHelpController(string $title): array {
    return [
      "marcas" => cargarDatos(DB_MARCAS),
      "template" => "help",
      "title" => $title
    ];
  }