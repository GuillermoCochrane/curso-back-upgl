<?php
  declare(strict_types=1);// Setea tipado fuerte para todo el archivo

  $frutasIniciales = [ // Fallback de datos por si el  JSON no existe
    [
      'id' => 1, 
      'nombre' => 'Manzana', 
      'icono' => '🍎', 
      'imagen' => 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?auto=format&fit=crop&w=200&q=80'
    ],
    [
      'id' => 2, 
      'nombre' => 'Banana', 
      'icono' => '🍌', 
      'imagen' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?auto=format&fit=crop&w=200&q=80'
    ],
    [
      'id' => 3, 
      'nombre' => 'Naranja', 
      'icono' => '🍊', 
      'imagen' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?auto=format&fit=crop&w=200&q=80'
    ],
  ];

  //funcion de recuperacion de DB en JSON
  function cargarFrutas(string $archivo, array $frutasIniciales): array {
    if (!file_exists($archivo)) { // si no existe la DB, la crea con el Fallback
      guardarFrutas($archivo, $frutasIniciales);
      return $frutasIniciales;
    }
  
    $contenido = file_get_contents($archivo); // recupera el contenido del archivo JSON
    $frutas = json_decode($contenido ?: '[]', true); // decodifica el JSON a un array asociativo
    return is_array($frutas) ? $frutas : []; //devuelve el array si es un array, sino uno array vacío
  }

  //funcion de guardado de DB en JSON
  function guardarFrutas(string $archivo, array $frutas): void {
    $carpeta = dirname($archivo); 
    if (!is_dir($carpeta)) { // verifica que la carpeta de datos exista, y si no, la crea
      mkdir($carpeta, 0775, true);
    }

    $json = json_encode($frutas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); // transforma los datos a JSON 

    if ($json === false || file_put_contents($archivo, $json, LOCK_EX) === false) { // Si los datos no existen o la escritura falla, advierte el error
      throw new RuntimeException('No se pudieron guardar las frutas. Revisá los permisos de la carpeta datos.');
    }
  }
?>