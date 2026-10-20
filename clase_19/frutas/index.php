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
    <title>CRUD de frutas con PHP</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>🍓 Mi lista de frutas</h1>
    <p class="ayuda">Un ejemplo de altas, búsquedas, modificaciones y bajas (CRUD) con PHP, arrays y un archivo JSON.</p>

    <?php if ($mensaje !== ''): ?><p class="mensaje"><?= escapar($mensaje) ?></p><?php endif; ?>
    <?php
    // Componetizamos el formulario de alta y modificación
    require_once __DIR__ . '/componentes/formulario-fruta.php'; ?>
    <section class="tarjeta">
        <h2>Buscar una fruta</h2>
        <form method="get">
            <input type="text" name="buscar" placeholder="Escribí parte del nombre" value="<?= escapar($busqueda) ?>">
            <button type="submit">Buscar</button>
            <a class="boton secundario" href="index.php">Mostrar todas</a>
        </form>
    </section>
    <?php
    // Componetizamos la lista de frutas en PHP
    require_once __DIR__ . '/componentes/lista-frutas.php'; ?>
    <section class="tarjeta ayuda">
        <h2>¿Qué hace array_map?</h2>
        <p><code>array_map</code> recorre el array y devuelve otro array transformado. En este ejemplo combina el icono y el nombre:</p>
        <pre><?= escapar(implode("\n", $nombresParaResumen)) ?></pre>
        <p>Por ejemplo, <code>array_map(fn($fruta) => $fruta['nombre'], $frutas)</code> devuelve solo los nombres. <code>array_filter</code> se usa arriba para buscar y para quitar una fruta.</p>
    </section>
</body>
</html>