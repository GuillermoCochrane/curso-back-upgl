<?php
  declare(strict_types=1);

  if (isset($carpetaDatos) && !is_dir($carpetaDatos)) {
    mkdir($carpetaDatos, 0775, true);
  }

  $frutasIniciales = [
    ['id' => 1, 'nombre' => 'Manzana', 'icono' => '🍎', 'imagen' => 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?auto=format&fit=crop&w=200&q=80'],
    ['id' => 2, 'nombre' => 'Banana', 'icono' => '🍌', 'imagen' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?auto=format&fit=crop&w=200&q=80'],
    ['id' => 3, 'nombre' => 'Naranja', 'icono' => '🍊', 'imagen' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?auto=format&fit=crop&w=200&q=80'],
  ];

  function cargarFrutas(string $archivo, array $frutasIniciales): array {
    if (!file_exists($archivo)) {
      guardarFrutas($archivo, $frutasIniciales);
      return $frutasIniciales;
    }
    $contenido = file_get_contents($archivo);
    $frutas = json_decode($contenido ?: '[]', true);
    return is_array($frutas) ? $frutas : [];
  }

  function guardarFrutas(string $archivo, array $frutas): void {
    $carpeta = dirname($archivo);
    if (!is_dir($carpeta)) {
      mkdir($carpeta, 0775, true);
    }
    $json = json_encode($frutas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    if ($json === false || file_put_contents($archivo, $json, LOCK_EX) === false) {
      throw new RuntimeException('No se pudieron guardar las frutas. Revisá los permisos de la carpeta datos.');
    }
  }


  function escapar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
  }

  function agregarFruta(string $archivo, array &$frutas, string $nombre, string $icono, string $imagen): string {
    if ($nombre === '' || $icono === '') {
      return 'Completá el nombre y el icono.';
    }

    $ids = array_column($frutas, 'id');
    $nuevoId = $ids === [] ? 1 : max($ids) + 1;
    $frutas[] = ['id' => $nuevoId, 'nombre' => $nombre, 'icono' => $icono, 'imagen' => $imagen];
    guardarFrutas($archivo, $frutas);

    return 'Fruta agregada.';
  }


  function modificarFruta(string $archivo, array &$frutas, int $id, string $nombre, string $icono, string $imagen): string {
    if ($nombre === '' || $icono === '') {
      return 'Completá el nombre y el icono para modificar.';
    }

    foreach ($frutas as &$fruta) {
      if ((int) $fruta['id'] === $id) {
        $fruta['nombre'] = $nombre;
        $fruta['icono'] = $icono;
        $fruta['imagen'] = $imagen;
        break;
      }
    }
    unset($fruta);
    guardarFrutas($archivo, $frutas);
    return 'Fruta modificada.';
  }


  function eliminarFruta(string $archivo, array &$frutas, int $id): string {
    $cantidadAntes = count($frutas);
    $frutas = array_values(array_filter($frutas, function ($fruta) use ($id) {
      return (int) $fruta['id'] !== $id;
    }));
    guardarFrutas($archivo, $frutas);
    return count($frutas) < $cantidadAntes ? 'Fruta eliminada.' : 'No se encontró esa fruta.';
  }

  function buscarFrutaPorId(array $frutas, int $id): ?array {
    if ($id <= 0) {
      return null;
    }

    foreach ($frutas as $fruta) {
      if ((int) $fruta['id'] === $id) {
        return $fruta;
      }
    }
    return null;
  }


  function filtrarFrutas(array $frutas, string $busqueda): array {
    if ($busqueda === '') {
      return $frutas;
    }

    return array_values(array_filter($frutas, function ($fruta) use ($busqueda) {
      return stripos($fruta['nombre'], $busqueda) !== false;
    }));
  }

  function obtenerResumenFrutas(array $frutas): array {
    return array_map(function ($fruta) {
      return $fruta['icono'] . ' ' . $fruta['nombre'];
    }, $frutas);
  }

  function renderizarCardFruta(array $fruta): void {
    include __DIR__ . '/card-fruta.php';
  }

?>