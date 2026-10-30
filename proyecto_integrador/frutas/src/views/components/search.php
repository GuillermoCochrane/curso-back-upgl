<section class="tarjeta">
  <h2>Buscar una fruta</h2>
  <form method="get">
    <!-- sanitiza el valor de busqueda, que se mantiene si se recarga la página -->
    <input
      type="text"
      name="buscar"
      placeholder="Escribí parte del nombre"
      value="<?= escapar(isset($busqueda) ? $busqueda : '') ?>">
    <button type="submit">Buscar</button>
    <a class="boton secundario" href="index.php">Mostrar todas</a>
  </form>
</section>