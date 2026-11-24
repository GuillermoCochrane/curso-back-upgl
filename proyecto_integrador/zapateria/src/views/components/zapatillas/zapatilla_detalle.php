<main id="top" class="container py-5" style="width: 65%;">
  <?php 
    require_once __DIR__ . "/handlers/detalle_zapatilla_handler.php"; 
    render_detalle_zapatilla($zapatilla ?? [], $alerta ?? []);
  ?>
</main>