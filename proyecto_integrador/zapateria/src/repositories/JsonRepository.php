<?php
  declare(strict_types=1);

  // Función genérica de recuperación de DB en JSON
  function cargarDatos(string $archivo): array {
    // Si el archivo no existe, devolvemos un array vacío sin tirar warning
    if (!file_exists($archivo)) {
      guardarDatos($archivo, []);
      return [];
    }

    $contenido = file_get_contents($archivo);
    $datos = json_decode($contenido ?: '[]', true);

    return is_array($datos) ? $datos : [];
  }

  function guardarDatos(string $archivo, array $datos): void {
    $carpeta = dirname($archivo);
    if (!is_dir($carpeta)) {
      mkdir($carpeta, 0775, true);
    }

    $json = json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    if ($json === false || file_put_contents($archivo, $json, LOCK_EX) === false) {
      throw new RuntimeException('No se pudieron guardar los datos. Revisá los permisos de la carpeta' . $carpeta);
    }
  }