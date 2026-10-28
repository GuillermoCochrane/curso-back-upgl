<?php
    declare(strict_types=1);
    require_once __DIR__ . '/funciones.php';

    $archivo = dirname(__DIR__) . '/datos/frutas.json';
    $carpetaDatos = dirname($archivo);  
    $frutas = cargarFrutas($archivo, $frutasIniciales); 
    $mensaje = '';

    if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
        $accion = $_POST['accion'] ?? '';
        $nombre = trim((string) ($_POST['nombre'] ?? ''));
        $icono = trim((string) ($_POST['icono'] ?? ''));
        $imagen = trim((string) ($_POST['imagen'] ?? ''));
        if ($imagen !== '' && filter_var($imagen, FILTER_VALIDATE_URL) === false) {
            $mensaje = 'El link de la imagen debe ser una URL válida (por ejemplo, empezar con https://).';
        }

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

    $busqueda = trim((string) ($_GET['buscar'] ?? ''));
    $frutasVisibles = filtrarFrutas($frutas, $busqueda);
    $nombresParaResumen = obtenerResumenFrutas($frutas);

    $frutaEditar = buscarFrutaPorId($frutas, (int) ($_GET['editar'] ?? 0));
?>