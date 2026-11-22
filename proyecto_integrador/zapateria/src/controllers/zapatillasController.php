<?php
  declare(strict_types=1);

  require_once __DIR__ . "/../services/CRUDServices.php";

  function datosZapatillas(): array {
    return [
      "zapatillas" => cargarDatos(DB_ZAPATILLAS),
      "marcas"     => cargarDatos(DB_MARCAS),
      "template"   => "zapatillas",
      "scripts"    => "zapatillas"
    ];
  }

  function datosZapatilla(string $id): array {
    $zapatillas = cargarDatos(DB_ZAPATILLAS);
    $zapatilla = array_filter($zapatillas, fn($z) => $z['id'] == $id);
    $zapatilla = array_shift($zapatilla);
    return [
      "zapatilla" => $zapatilla,
      "marcas"    => cargarDatos(DB_MARCAS),
      "template"  => "detalle_zapatilla",
      "scripts"   => "zapatillas"
    ];
  }

  function datosCrearZapatilla(): array {
    return [
      "marcas"    => cargarDatos(DB_MARCAS),
      "template"  => "crear_zapatilla",
      "scripts"   => "bootstrap",
      "form_path" => BASE_PATH. "/pages/zapatillas/crear/"
    ];
  }

  function crearZapatilla(): void {
    $nuevoId = agregarEntrada( $_POST, 'zapatillas', DB_ZAPATILLAS);
    header('Location: ' . BASE_PATH . '/pages/zapatillas/detalle?id=' . $nuevoId);
    exit;
  }