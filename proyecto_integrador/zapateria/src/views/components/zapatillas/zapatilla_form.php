<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 bg-white p-4 p-md-5 rounded-4 shadow-sm">

      <h2 class="mb-4 fw-bold text-primary">
        <?= isset($editar) && $editar ? "Editar " : "Agregar " ?>
        Zapatilla
        <?= isset($editar) && $editar && isset($datos['nombre']) ? ": " . $datos['nombre'] : "" ?>
      </h2>

      <?php 
        if (!empty($alerta["message"])): 
          $template_path = __DIR__ . "/../../partials/alert/alert";
          render($template_path, $alerta);
        endif;
      ?>

      <form method="POST" action="<?= $form_path ?? '' ?>" class="row g-3">
        <?php 
          include_once __DIR__."/handlers/zapatillas_form_handler.php";
          render_form_zapatilla($campos);
        ?>
      </form>

    </div>
  </div>

</main>