<?php
  declare(strict_types=1);// Setea tipado fuerte para todo el archivo

  require_once __DIR__ . '/../utilities/frutasRepository.php';
  require_once __DIR__ . '/../utilities/validations.php';

  // Funciones de Carga de datos nuevos
  function agregarFruta(string $archivo, array $frutas, string $nombre, string $icono, string $imagen): array {
    // Validación de campos obligatorios
    $validacion = validarCamposRequeridos([
        'nombre' => $nombre,
        'icono' => $icono
    ]);

    if ($validacion !== '') {
      return ["frutas" => $frutas, "mensaje" => $validacion];
    }

    $ids = array_column($frutas, 'id'); // arma un array con los ids de la  frutas en la DB
    $nuevoId = $ids === [] ? 1 : max($ids) + 1; //el arrya esta vacio, el nuevo id es 1, sino el maximo + 1
    $frutas[] = ['id' => $nuevoId, 'nombre' => $nombre, 'icono' => $icono, 'imagen' => $imagen]; //crea los datos del nuevo registro y los agrega al array de frutas (seria como un push de javascript?)
    guardarFrutas($archivo, $frutas); // Actializa la DB

    return ["frutas" => $frutas, "mensaje" => 'Fruta agregada.']; 
  }

  // Funciones de Edicion de frutas
  function modificarFruta(string $archivo, array $frutas, int $id, string $nombre, string $icono, string $imagen): array {

    // Validación de campos obligatorios
    $validacion = validarCamposRequeridos([
        'nombre' => $nombre,
        'icono' => $icono,
    ]);

    if ($validacion !== '') {
      return ["frutas" => $frutas, "mensaje" => $validacion];
    }

    $encontrada = false; // Variable para verificar si se encontró la fruta a modificar
    // recorre el array de frutas, y cuando lo encuentra el id, actualiza los datos
    foreach ($frutas as &$fruta) { //
      if ((int) $fruta['id'] === $id) {
        $fruta['nombre'] = $nombre;
        $fruta['icono'] = $icono;
        $fruta['imagen'] = $imagen;
        $encontrada = true; // Marca que se encontró la fruta
        break;
      }
    }

    unset($fruta); //elimina la variable 
    $mensaje = $encontrada ? 'Fruta modificada.' : 'No se encontró esa fruta.'; // Mensaje según si se encontró o no la fruta
    if ($encontrada) { guardarFrutas($archivo, $frutas); } // Actualiza la DB
    return ["frutas" => $frutas, "mensaje" => $mensaje]; // Notifica
  }

  // Funciones de Eliminación de frutas
  function eliminarFruta(string $archivo, array $frutas, int $id): array {
    $cantidadAntes = count($frutas); // Guarda la cantidad de frutas antes de eliminar (similar a un length de javascript)
    
    $frutas = array_values(array_filter($frutas, function ($fruta) use ($id) {
      //supongo que el array_filter  devuelve los elemento que coinciden con las condiciones del callback (en este caso, los que no coinciden con el id)
      //array_values no se que hace
      return (int) $fruta['id'] !== $id;
    }));

    $eliminada = count($frutas) < $cantidadAntes; // Verifica si se eliminó alguna fruta comparando la cantidad antes y después

    // que ganas de complicarnos la vida al cuete, con algo que no nos dieron teoria!
    //buscar teoria de array_values y array_filter, y que hace el callback
    if ($eliminada) { guardarFrutas($archivo, $frutas); } // Actualiza la DB si se eliminó alguna fruta
    $mensaje = $eliminada ? 'Fruta eliminada.' : 'No se encontró esa fruta.'; // Notifica si se eliminó o no
    return ["frutas" => $frutas, "mensaje" => $mensaje];
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
      // Si la búsqueda está vacía, devolvemos todo sin mensaje de error
      if ($busqueda === '') {
          return ["frutas" => $frutas, "mensaje" => ''];
      }

      $resultado = array_values(array_filter($frutas, function ($fruta) use ($busqueda) {
          return stripos($fruta['nombre'], $busqueda) !== false;
      }));

      // Si no se encontró nada, preparamos un mensaje
      if (count($resultado) === 0) {
          return ["frutas" => [], "mensaje" => "No se encontraron frutas con '$busqueda'."];
      }

      return ["frutas" => $resultado, "mensaje" => ''];
  }

?>