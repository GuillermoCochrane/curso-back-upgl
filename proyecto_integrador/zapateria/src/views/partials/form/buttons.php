<div class="col-12 mt-4">
  <button 
    type="submit" 
    class="btn <?= escapar($submit_class ?? 'btn-primary') ?> px-4 rounded-pill"
  >
    <?= escapar($submit_text ?? 'Guardar') ?>
  </button>
  <a 
    href="<?= escapar($cancel_url ?? BASE_PATH) ?>" 
    class="btn btn-outline-secondary px-4 rounded-pill ms-2"
  >
    <?= escapar($cancel_text ?? 'Cancelar') ?>
  </a>
</div>