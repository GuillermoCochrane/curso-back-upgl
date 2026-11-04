<?php
  declare(strict_types=1);// Setea tipado fuerte para todo el archivo

  require_once __DIR__ . '/../utilities/frutasRepository.php';
  require_once __DIR__ . '/../utilities/validations.php';

  // Funciones de Carga de datos nuevos
  function agregarFruta(string $archivo, array &$frutas, string $nombre, string $icono, string $imagen): string {
    // Validación de campos obligatorios
    $validacion = validarCamposRequeridos([
        'nombre' => $nombre,
        'icono' => $icono
    ]);

    if ($validacion !== '') {
      return $validacion;
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
    $validacion = validarCamposRequeridos([
        'nombre' => $nombre,
        'icono' => $icono
    ]);

    if ($validacion !== '') {
      return $validacion;
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

?>