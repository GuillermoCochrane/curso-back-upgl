<?php
  require_once __DIR__ . '/componentes/inicio.php'; // Prepara todos los datos y funciones necesarias para la página
?>
<!-- template base (nas adelante lo modularizare por secciones y secciones en componentes) -->
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD de frutas con PHP</title>
  <link rel="stylesheet" href="./public/css/estilos.css">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E🍓%3C/text%3E%3C/svg%3E">
</head>

<body>
  <h1>🍓 Mi lista de frutas</h1>
  <p class="ayuda">Un ejemplo de altas, búsquedas, modificaciones y bajas (CRUD) con PHP, arrays y un archivo JSON.</p>

  <?php if ($mensaje !== ''): ?>
    <p class="mensaje"><?= escapar($mensaje) ?></p>
    <!-- Si llega el mensaje, sanitiza el mensaje para que no tenga cosas raras -->
  <?php endif; ?>

  <?php
    require_once __DIR__ . '/componentes/formulario-fruta.php';
    // template del formulario de alta y modificación de frutas
  ?>

  <section class="tarjeta">
    <h2>Buscar una fruta</h2>
    <form method="get">
      <!-- sanitiza el valor de busqueda, que se mantiene si se recarga la página -->
      <input
        type="text"
        name="buscar"
        placeholder="Escribí parte del nombre"
        value="<?= escapar($busqueda) ?>"
      >
      <button type="submit">Buscar</button>
      <a class="boton secundario" href="index.php">Mostrar todas</a>
    </form>
  </section>

  <?php
  require_once __DIR__ . '/componentes/lista-frutas.php';
  // renderiza la lista de frutas (completa o filtrada por búsqueda)
  ?>

</body>

</html>