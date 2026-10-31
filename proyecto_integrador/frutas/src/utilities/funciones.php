<?php
  declare(strict_types=1);// Setea tipado fuerte para todo el archivo

  if (isset($carpetaDatos) && !is_dir($carpetaDatos)) { //verifica que la carpeta de datos exista, y si no, la crea
    mkdir($carpetaDatos, 0775, true);
  }

  $frutasIniciales = [ // Fallback de datos por si el  JSON no existe
    ['id' => 1, 'nombre' => 'Manzana', 'icono' => '🍎', 'imagen' => 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?auto=format&fit=crop&w=200&q=80'],
    ['id' => 2, 'nombre' => 'Banana', 'icono' => '🍌', 'imagen' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?auto=format&fit=crop&w=200&q=80'],
    ['id' => 3, 'nombre' => 'Naranja', 'icono' => '🍊', 'imagen' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?auto=format&fit=crop&w=200&q=80'],
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

  // Sanitizador de Datos
  function escapar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
  }

  // Funciones de Carga de datos nuevos
  function agregarFruta(string $archivo, array &$frutas, string $nombre, string $icono, string $imagen): string {
    // Validación de campos obligatorios
    if ($nombre === '' || $icono === '') {
      return 'Completá el nombre y el icono.';
    }

    $ids = array_column($frutas, 'id'); // arma un array con los ids de la  frutas en la DB
    $nuevoId = $ids === [] ? 1 : max($ids) + 1; //el arrya esta vacio, el nuevo id es 1, sino el maximo + 1
    $frutas[] = ['id' => $nuevoId, 'nombre' => $nombre, 'icono' => $icono, 'imagen' => $imagen]; //crea los datos del nuevo registro y los agrega al array de frutas (seria como un push de javascript?)
    guardarFrutas($archivo, $frutas); // Actializa la DB

    return 'Fruta agregada.'; // Notifica
  }


  // Funciones de Edicion de frutas
  function modificarFruta(string $archivo, array &$frutas, int $id, string $nombre, string $icono, string $imagen): string {

    // Validación de campos obligatorios
    if ($nombre === '' || $icono === '') { 
      return 'Completá el nombre y el icono para modificar.';
    }


    // recorre el array de frutas, y cuando lo encuentra el id, actualiza los datos
    foreach ($frutas as &$fruta) { //
      if ((int) $fruta['id'] === $id) {
        $fruta['nombre'] = $nombre;
        $fruta['icono'] = $icono;
        $fruta['imagen'] = $imagen;
        break;
      }
    }

    unset($fruta); //elimina la variable 
    guardarFrutas($archivo, $frutas); // Actualiza la DB
    return 'Fruta modificada.'; // Notifica
  }


  // Funciones de Eliminación de frutas
  function eliminarFruta(string $archivo, array &$frutas, int $id): string {
    $cantidadAntes = count($frutas); // Guarda la cantidad de frutas antes de eliminar (similar a un length de javascript)
    
    $frutas = array_values(array_filter($frutas, function ($fruta) use ($id) {
      //supongo que el array_filter  devuelve los elemento que coinciden con las condiciones del callback (en este caso, los que no coinciden con el id)
      //array_values no se que hace
      return (int) $fruta['id'] !== $id;
    }));

    // que ganas de complicarnos la vida al cuete, con algo que no nos dieron teoria!
    //buscar teoria de array_values y array_filter, y que hace el callback
    guardarFrutas($archivo, $frutas); // Actualiza la DB
    return count($frutas) < $cantidadAntes ? 'Fruta eliminada.' : 'No se encontró esa fruta.'; // Notifica si se eliminó o no
  }

  // Funciones de Busqueda por id
  function buscarFrutaPorId(array $frutas, int $id): ?array {
    //valida que el id sea mayor a 0
    if ($id <= 0) {
      return null;
    }

    // recorre el array y nos devuelve la fruta de ese id (con array_filter no seria mas facil?)
    foreach ($frutas as $fruta) {
      if ((int) $fruta['id'] === $id) {
        return $fruta;
      }
    }

    return null; // si no encuentra la fruta, devuelve null
  }


  // Funciones de Filtrado por nombre 
  function filtrarFrutas(array $frutas, string $busqueda): array {
    // valida si la busqueda es vacia, y si lo es, devuelve todas las frutas
    if ($busqueda === '') {
      return $frutas;
    }

    // similar a lo de eliminarFruta, pero en este caso devuelve las frutas que coinciden con la busqueda
    return array_values(array_filter($frutas, function ($fruta) use ($busqueda) {
      return stripos($fruta['nombre'], $busqueda) !== false; // no se que hace stripos
    }));
  }

  // Funciones de Renderizado de Card de fruta
  function renderizarCardFruta(array $fruta): void {
    include __DIR__ . '/../views/partials/card-fruta.php';
  }

  function sanitizarEntrada(?string $entrada): string {
      $entrada = (string) ($entrada ?? '');
      $entrada = strip_tags($entrada); 
      $entrada = trim($entrada);
      return $entrada;
  }

  function sanitizarPost(string $key): string {
      return sanitizarEntrada($_POST[$key] ?? null);
  }

  function sanitizarGet(string $key): string {
      return sanitizarEntrada($_GET[$key] ?? null);
  }

  function recuperarPostID(): int {
    return (int) ($_POST['id'] ?? 0);
  }

  function recuperarGetID(): int {
    return (int) ($_GET['editar'] ?? 0);
  }

  function validarImagen(string $imagen): string {
      if ($imagen !== '' && filter_var($imagen, FILTER_VALIDATE_URL) === false) {
          return 'El link de la imagen debe ser una URL válida (por ejemplo, empezar con https://).';
      }
      return ''; 
}

?>