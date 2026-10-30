<?php
  if (empty($fruta) || !isset($fruta['id'])) {
    return;
  }
?>
<div class="card-fruta">
  <?php if (!empty($fruta['imagen'])): ?>
    <img 
      class="card-fruta-img" 
      src="<?= escapar($fruta['imagen']) ?>" 
      alt="Foto de <?= escapar($fruta['nombre']) ?>" 
      loading="lazy"
    >
  <?php else: ?>
    <div class="card-fruta-img-placeholder">
      <span><?= escapar($fruta['icono']) ?></span>
    </div>
  <?php endif; ?>

  <div class="card-fruta-cuerpo">
    <h3 class="card-fruta-titulo">
      <span class="card-fruta-icono"><?= escapar($fruta['icono']) ?></span>
      <span><?= escapar($fruta['nombre']) ?></span>
    </h3>

    <div class="card-fruta-acciones">
      <a 
        class="boton secundario" 
        href="?editar=<?= (int) $fruta['id'] ?>"
      >
        Modificar
      </a>
      <form method="post" onsubmit="return confirm('¿Eliminar esta fruta?');">
        <input type="hidden" name="accion" value="eliminar">
        <input type="hidden" name="id" value="<?= (int) $fruta['id'] ?>">
        <button class="peligro" type="submit">Eliminar</button>
      </form>
    </div>
  </div>
</div>