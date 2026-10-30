<?php
// ==============================================================================
// COMPONENTE: Card de zapatilla
// ==============================================================================
// Este componente dibuja una tarjeta individual con la información de una zapatilla.
//
// Datos esperados en $zapatilla:
//   - $zapatilla['id']: ID numérico de la zapatilla
//   - $zapatilla['nombre']: Nombre de la zapatilla
//   - $zapatilla['icono']: Emoji o icono representativo
//   - $zapatilla['imagen']: URL de la imagen (puede estar vacía)
/** @var array $zapatilla */
if (empty($zapatilla) || !isset($zapatilla['id'])) {
    return;
}
?>
<div class="card-zapatilla">
    <?php if (!empty($zapatilla['imagen'])): ?>
        <img class="card-zapatilla-img" src="<?= escapar($zapatilla['imagen']) ?>" alt="Foto de <?= escapar($zapatilla['nombre']) ?>" loading="lazy">
    <?php else: ?>
        <div class="card-zapatilla-img-placeholder">
            <span><?= escapar($zapatilla['icono']) ?></span>
        </div>
    <?php endif; ?>

    <div class="card-zapatilla-cuerpo">
        <h3 class="card-zapatilla-titulo">
            <span class="card-zapatilla-icono"><?= escapar($zapatilla['icono']) ?></span>
            <span><?= escapar($zapatilla['nombre']) ?></span>
        </h3>

        <div class="card-zapatilla-acciones">
            <a class="boton secundario" href="?editar=<?= (int) $zapatilla['id'] ?>">Modificar</a>
            <form method="post" onsubmit="return confirm('¿Eliminar esta zapatilla?');">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id" value="<?= (int) $zapatilla['id'] ?>">
                <button class="peligro" type="submit">Eliminar</button>
            </form>
        </div>
    </div>
</div>
