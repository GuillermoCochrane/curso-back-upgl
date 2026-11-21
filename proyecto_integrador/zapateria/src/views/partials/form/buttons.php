<div class="col-12 mt-4">
  <button 
    type="submit" 
    class="btn btn-primary px-4 rounded-pill"
  >
    Guardar <?= $entidad ?? '' ?>
  </button>
  <a 
    href="<?= BASE_PATH ?>/pages/<?= strtolower($entidad ?? 'zapatilla') ?>s" 
    class="btn btn-outline-secondary px-4 rounded-pill ms-2"
  >
    Cancelar
  </a>
</div>