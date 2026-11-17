<main id="top" class="container py-5">
  <section class="mb-5">
    <span class="text-uppercase small fw-semibold text-secondary">
      Catálogo completo
    </span>
    <h2 class="display-6 fw-bold mt-2">Todas nuestras zapatillas.</h2>
    <p class="text-body-secondary mb-0">Explorá todos los modelos disponibles, compará precios y encontrá el par perfecto para tu estilo.</p>
  </section>
  <section class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
    <?php  
      require_once __DIR__ . "/handlers/zapatillas_handler.php"; 
      render_zapatillas($zapatillas ?? []);
    ?>
  </section>
</main>