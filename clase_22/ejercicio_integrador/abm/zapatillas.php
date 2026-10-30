<?php

/*
En PHP, declare(strict_types=1); sirve para activar el modo estricto de tipos para ese archivo.
Evita errores silenciosos: Detecta incoherencias antes de que causen fallos difíciles de rastrear.
Código más predecible y seguro: Asegura que los datos que entran y salen de tus funciones sean exactamente los esperados.
*/
require_once __DIR__ . '/componentes/inicio.php';
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD de zapatillas con PHP</title>
    <link rel="stylesheet" href="../css/estilos.css"> 
    <link rel="stylesheet" href="../abm/estilos_abm.css">
</head>

<body>
    <main class="abm-contenido">
    <h1> Mi lista de zapatillas</h1>
    <p class="ayuda">Un ejemplo de altas, búsquedas, modificaciones y bajas (CRUD) con PHP, arrays y un archivo JSON.</p>
    <?php if ($mensaje !== ''): ?><p class="mensaje"><?= escapar($mensaje) ?></p><?php endif; ?>
    <?php
    // Componetizamos el formulario de alta y modificación
    require_once __DIR__ . '/componentes/formulario-zapatilla.php';
    // Componetizamos el formulario de búsqueda
    require __DIR__ . '/componentes/formulario-busqueda.php';
    // Componetizamos la lista de zapatillas en PHP
    require_once __DIR__ . '/componentes/lista-zapatillas.php'; 
   
    ?>
    </main>
</body>
</html>
