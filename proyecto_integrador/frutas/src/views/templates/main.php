<!doctype html>
<html lang="es">

  <?php include __DIR__ . '/../components/head.php'; ?>

<body>
  <header>
    <h1>🍓 Mi lista de frutas</h1>
    <p class="ayuda">Un ejemplo de altas, búsquedas, modificaciones y bajas (CRUD) con PHP, arrays y un archivo JSON.</p>
    <?php if ($mensaje !== ''): ?>
      <p class="mensaje">
        <?= escapar($mensaje) ?>
      </p>
      <!-- Si llega el mensaje, sanitiza el mensaje para que no tenga cosas raras -->
    <?php endif; ?>
  </header>
  <main>

    <?php
      require_once __DIR__ . '/../components/formulario-fruta.php';
      // componente del formulario de alta y modificación de frutas
    ?>

    <section class="tarjeta">
      <h2>Buscar una fruta</h2>
      <form method="get">
        <!-- sanitiza el valor de busqueda, que se mantiene si se recarga la página -->
        <input
          type="text"
          name="buscar"
          placeholder="Escribí parte del nombre"
          value="<?= escapar(isset($busqueda) ? $busqueda : '') ?>"
        >
        <button type="submit">Buscar</button>
        <a class="boton secundario" href="index.php">Mostrar todas</a>
      </form>
    </section>

    <?php
      require_once __DIR__ . '/../components/lista-frutas.php';
      // renderiza la lista de frutas (completa o filtrada por búsqueda)
    ?>
  </main>

</body>
</html>