<?php
  declare(strict_types=1);

  function render(string $template, array $data = []): void {
    $archivo = "$template.php";
    
    // Validación defensiva por si la ruta está mal
    if (!file_exists($archivo)) {
        throw new RuntimeException("El template no existe: $archivo");
    }

    // Extrae las variables del array asociativo
    extract($data);
    
    // Renderiza el archivo
    require $archivo;
  }
