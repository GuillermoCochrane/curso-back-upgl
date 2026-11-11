<section 
  id="<?= isset($marca) ? $marca : "marca-generica" ?>" 
  class="marca-seccion pb-5 mb-4"
  >
    <h2 class="border-start border-4 border-warning ps-3 mb-4 fw-bold h3">
      <?= isset($marca) ? $marca : "Marca Generica" ?>
    </h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
      <?php
        foreach (isset($modelos) ? $modelos : [] as $modelo) {
          extract($modelo);
          include("components/zapatillas/card_zapatillas.php");
        } 
      ?>
    </div>
</section>
