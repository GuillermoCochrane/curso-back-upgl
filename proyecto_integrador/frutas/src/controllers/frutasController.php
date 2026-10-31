<?php
    declare(strict_types=1); // Setea tipado fuerte para todo el archivo
    require_once __DIR__ . '/../utilities/funciones.php'; // importamos una sola vez las funciones auxiliares 

    $archivo = dirname(__DIR__) . '/data/frutas.json'; // ruta de la DB de frutas
    $carpetaDatos = dirname($archivo);  // Carpeta de almacenamiento de DB
    $frutas = cargarFrutas($archivo, $frutasIniciales ?? []); // ejecuta funcion auxiliar para cargar frutas desde archivo JSON
    $mensaje = ''; // setea mensaje vacío

		// Controlador
    if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') { // si llega un post...
        $accion = $_POST['accion'] ?? ''; // recuperamos la acción a realizar, y si no hay, la dejamos vacía
        //Guardamos el nombre, icono e imagen de la fruta, sanitizando los valores recibidos
				$nombre = trim((string) ($_POST['nombre'] ?? '')); //no deberia usar escapar?
        $icono = trim((string) ($_POST['icono'] ?? ''));
        $imagen = trim((string) ($_POST['imagen'] ?? ''));

				// Verificamos que la URL de la imagen sea válida, y seteamos el mensaje 
        if ($imagen !== '' && filter_var($imagen, FILTER_VALIDATE_URL) === false) {
            $mensaje = 'El link de la imagen debe ser una URL válida (por ejemplo, empezar con https://).';
        }

				// Dependiendo de la acción, llamamos a la función correspondiente para agregar, modificar o eliminar una fruta y seteamos el mensaje 
        if ($accion === 'agregar' && $mensaje === '') {
            $mensaje = agregarFruta($archivo, $frutas, $nombre, $icono, $imagen);
        }

        if ($accion === 'modificar' && $mensaje === '') {
            $id = (int) ($_POST['id'] ?? 0);
            $mensaje = modificarFruta($archivo, $frutas, $id, $nombre, $icono, $imagen);
        }

        if ($accion === 'eliminar') {
            $id = (int) ($_POST['id'] ?? 0);
            $mensaje = eliminarFruta($archivo, $frutas, $id);
        }
    }

		// Recuperamos el valor de búsqueda desde la URL y los sanitizamos (otra vez no deberia escapar?)
    $busqueda = trim((string) ($_GET['buscar'] ?? ''));
    $frutasVisibles = filtrarFrutas($frutas, $busqueda); // filtramos las frutas según la búsqueda
    $nombresParaResumen = obtenerResumenFrutas($frutas); // armamos un resumen de nombres de frutas para mostrar en la lista

    $frutaEditar = buscarFrutaPorId($frutas, (int) ($_GET['editar'] ?? 0)); // recuperamos la fruta a editar según el id del get
?>