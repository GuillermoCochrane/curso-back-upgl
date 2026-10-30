<?php

declare(strict_types=1);

require_once __DIR__ . '/funciones.php';

$archivo = dirname(__DIR__) . '/datos/zapatillas.json';
$carpetaDatos = dirname($archivo);  //directorio del archivo 
$zapatillas = cargarzapatillas($archivo, $zapatillasIniciales); //carga de zapatillas del archivo 
$mensaje = '';

// Los cambios llegan por POST. Cada opción del formulario representa una acción CRUD.
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $nombre = trim((string) ($_POST['nombre'] ?? ''));
    $icono = trim((string) ($_POST['icono'] ?? ''));
    $imagen = trim((string) ($_POST['imagen'] ?? ''));
    if ($imagen !== '' && filter_var($imagen, FILTER_VALIDATE_URL) === false) {
        $mensaje = 'El link de la imagen debe ser una URL válida (por ejemplo, empezar con https://).';
    }

    if ($accion === 'agregar' && $mensaje === '') {
        $mensaje = agregarzapatilla($archivo, $zapatillas, $nombre, $icono, $imagen);
    }

    if ($accion === 'modificar' && $mensaje === '') {
        $id = (int) ($_POST['id'] ?? 0);
        $mensaje = modificarzapatilla($archivo, $zapatillas, $id, $nombre, $icono, $imagen);
    }

    if ($accion === 'eliminar') {
        $id = (int) ($_POST['id'] ?? 0);
        $mensaje = eliminarzapatilla($archivo, $zapatillas, $id);
    }
}

// Búsqueda y preparación de datos para la vista
$busqueda = trim((string) ($_GET['buscar'] ?? ''));
$zapatillasVisibles = filtrarzapatillas($zapatillas, $busqueda);
$nombresParaResumen = obtenerResumenzapatillas($zapatillas);

// Preparamos los datos de edición si se pulsó Modificar (resuelto en una sola línea)
$zapatillaEditar = buscarzapatillaPorId($zapatillas, (int) ($_GET['editar'] ?? 0));
