<?php
    declare(strict_types=1); // Setea tipado fuerte para todo el archivo

    // importamos una sola vez las funciones auxiliares 
    require_once __DIR__ . '/../utilities/validations.php';
    require_once __DIR__ . '/../services/frutasServices.php'; 
    require_once __DIR__ . '/../utilities/utilities.php';

    $archivo = dirname(__DIR__) . '/data/frutas.json'; // ruta de la DB de frutas
    $frutas = cargarFrutas($archivo, $frutasIniciales ?? []); // ejecuta funcion auxiliar para cargar frutas desde archivo JSON
    $mensaje = ''; // setea mensaje vacío


		// Controlador
    if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') { // si llega un post...
        $accion = $_POST['accion'] ?? ''; // recuperamos la acción a realizar, y si no hay, la dejamos vacía
        //Guardamos el nombre, icono e imagen de la fruta, sanitizando los valores recibidos
				$nombre = sanitizarPost('nombre');
        $icono = sanitizarPost('icono');
        $imagen = sanitizarPost('imagen');

				// Verificamos que la URL de la imagen sea válida, y seteamos el mensaje 
      if ($accion === 'agregar' || $accion === 'modificar') {
          $mensaje = validarImagen($imagen);
      }

      // Dependiendo de la acción, llamamos a la función correspondiente para agregar, modificar o eliminar una fruta y seteamos el mensaje 
      if($mensaje === '') {
        $resultado = match ($accion) {
            'agregar'   => agregarFruta($archivo, $frutas, $nombre, $icono, $imagen),
            'modificar' => modificarFruta($archivo, $frutas, recuperarPostID(), $nombre, $icono, $imagen),
            'eliminar'  => eliminarFruta($archivo, $frutas, recuperarPostID()),
            default     => ["frutas" => $frutas, "mensaje" => 'Acción no válida']
        };
        $frutas = $resultado['frutas'];
        $mensaje = $resultado['mensaje'];
      }
    }


		// Recuperamos el valor de búsqueda desde la URL y los sanitizamos
    $busqueda = sanitizarGet('buscar');
    $frutasVisibles = filtrarFrutas($frutas, $busqueda); // filtramos las frutas según la búsqueda

    $frutaEditar = buscarFrutaPorId($frutas, recuperarGetID() ); // recuperamos la fruta a editar según el id del get
?>