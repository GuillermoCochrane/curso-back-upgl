<?php include_once __DIR__."/../components/zapatillas/home_hero.php" ?>
<?php include_once __DIR__."/../components/zapatillas/home_navbar.php" ?>

<main id="top" class="container py-5">
  <div class="mb-5">
    <span class="text-uppercase small fw-semibold text-secondary">
      Encontrá tu próximo par
    </span>
    <h2 class="display-6 fw-bold mt-2">Un estilo para cada paso.</h2>
    <p class="text-body-secondary mb-0">Explorá nuestras marcas y conocé los detalles de cada modelo.</p>
  </div>
  <?php  include __DIR__ . "/../components/zapatillas/handlers/marcas_handler.php"; ?>
</main>

<!-- Modal de detalles de zapatilla -->

<?php include __DIR__ . "/../components/zapatillas/zapatillas_modal.php"; ?>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
  crossorigin="anonymous"
>
</script>
<script src="./public/script/carga_zapatillas.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/@google/model-viewer@4.1.0/dist/model-viewer.min.js"></script>
<script src="./public/script/hero-zapatilla.js" defer></script>