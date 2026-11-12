<?php
  declare(strict_types=1);

  // Función genérica de recuperación de DB en JSON
  function cargarDatos(string $archivo): array {
    // Si el archivo no existe, devolvemos un array vacío sin tirar warning
    if (!file_exists($archivo)) {
        return [];
    }

    $contenido = file_get_contents($archivo);
    $datos = json_decode($contenido ?: '[]', true); 
    
    return is_array($datos) ? $datos : []; 
  }