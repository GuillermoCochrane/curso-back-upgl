<div class="col-12 mt-4">
  <button 
    type="submit" 
    class="btn <?= $submit_class ?? 'btn-primary' ?> px-4 rounded-pill"
  >
    <?= $submit_text ?? 'Guardar' ?>
  </button>
  <a 
    href="<?= $cancel_url ?? BASE_PATH ?>" 
    class="btn btn-outline-secondary px-4 rounded-pill ms-2"
  >
    <?= $cancel_text ?? 'Cancelar' ?>
  </a>
</div>