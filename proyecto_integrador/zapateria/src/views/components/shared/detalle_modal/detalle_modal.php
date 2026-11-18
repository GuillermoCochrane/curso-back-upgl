<div 
  class="modal fade" 
  id="detallesModal" 
  tabindex="-1" 
  aria-labelledby="detallesModalLabel" 
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-0 rounded-4 shadow">
      <div class="modal-header px-4 py-3 bg-body-tertiary">
        <h2 class="modal-title fs-5 fw-bold text-primary" id="detallesModalLabel">Conocé tu próximo par</h2>
        <button 
          class="btn-close" 
          type="button" 
          data-bs-dismiss="modal" 
          aria-label="Cerrar"
          >
        </button>
      </div>
      <div class="modal-body p-4">
        <?php include __DIR__ . "/../detalle_zapatilla/detalle_zapatilla.php"; ?>
      </div>
      <div class="modal-footer bg-body-tertiary px-4">
        <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">Seguir explorando</button>
      </div>
    </div>
  </div>
</div>