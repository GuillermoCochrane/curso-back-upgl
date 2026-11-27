<div class="alert alert-<?= escapar($type ?? 'danger') ?> alert-dismissible fade show" role="alert">
  <?= escapar($message ?? '') ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>