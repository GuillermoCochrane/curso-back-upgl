<section 
  id="<?= $marca["nombre"] ?? "marca-generica" ?>" 
  class="marca-seccion pb-5 mb-4"
  >
    <h2 class="border-start border-4 border-warning ps-3 mb-4 fw-bold h3">
      <?= $marca["nombre"] ?? "Marca Generica" ?>
    </h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
        <?php
          /** @var array $marca */
          /** @var array $zapatilla */
          $callback_filtro_zapatillas = function($zapatilla) use ($marca) {
              return $zapatilla['marca_id'] === $marca['id'];
          };
          $zapatillasDeMarca = array_filter($zapatillas ?? [], $callback_filtro_zapatillas);

          foreach ($zapatillasDeMarca as $zapatilla) {
              extract($zapatilla);
              include __DIR__ . "/../../partials/zapatillas/card_zapatillas.php";
          }
        ?>
    </div>
</section>
