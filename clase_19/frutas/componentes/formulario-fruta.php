<?php
// ==============================================================================
// COMPONENTE: Formulario de Fruta (Alta / Modificación)
// ==============================================================================
// Este componente dibuja el formulario dinámico para agregar una fruta nueva
// o modificar los datos de una fruta existente si $frutaEditar contiene datos.
//
// Variables utilizadas del contexto:
//   - $frutaEditar: null para crear una nueva fruta, o array asociativo con los datos para editar.
/** @var array|null $frutaEditar */
$frutaEditar = $frutaEditar ?? null;
?>
<section class="tarjeta">
    <h2><?= $frutaEditar ? 'Modificar fruta' : 'Agregar una fruta' ?></h2>
    <form method="post">
        <input type="hidden" name="accion" value="<?= $frutaEditar ? 'modificar' : 'agregar' ?>">
        <?php if ($frutaEditar): ?>
            <input type="hidden" name="id" value="<?= (int) $frutaEditar['id'] ?>">
        <?php endif; ?>
        <input type="text" name="icono" placeholder="Icono, por ejemplo 🍐" aria-label="Icono" value="<?= escapar($frutaEditar['icono'] ?? '') ?>" required>
        <input type="text" name="nombre" placeholder="Nombre, por ejemplo Pera" aria-label="Nombre de la fruta" value="<?= escapar($frutaEditar['nombre'] ?? '') ?>" required>
        <input type="url" name="imagen" placeholder="Link de imagen (opcional)" aria-label="Link de imagen" value="<?= escapar($frutaEditar['imagen'] ?? '') ?>">
        <button type="submit"><?= $frutaEditar ? 'Guardar cambios' : 'Agregar' ?></button>
        <?php if ($frutaEditar): ?>
            <a class="boton secundario" href="index.php">Cancelar</a>
        <?php endif; ?>
    </form>
</section>
