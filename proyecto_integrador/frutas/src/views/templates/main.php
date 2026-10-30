<!doctype html>
<html lang="es">

  <?php include __DIR__ . '/../components/head.php'; ?>

<body>
  <?php include __DIR__ . '/../components/header.php'; ?>
  <main>

    <?php
      include __DIR__ . '/../components/formulario-fruta.php';
      // componente del formulario de alta y modificación de frutas

      include __DIR__ . '/../components/search.php';
      // componente del formulario de búsqueda de frutas

      include __DIR__ . '/../components/lista-frutas.php';
      // renderiza la lista de frutas (completa o filtrada por búsqueda)
    ?>
  </main>

</body>
</html>