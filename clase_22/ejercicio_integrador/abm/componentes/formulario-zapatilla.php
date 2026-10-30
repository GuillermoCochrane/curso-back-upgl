<?php
// ==============================================================================
// COMPONENTE: Formulario de zapatilla (Alta / Modificación)
// ==============================================================================
// Este componente dibuja el formulario dinámico para agregar una zapatilla nueva
// o modificar los datos de una zapatilla existente si $zapatillaEditar contiene datos.
//
// Variables utilizadas del contexto:
//   - $zapatillaEditar: null para crear una nueva zapatilla, o array asociativo con los datos para editar.
/** @var array|null $zapatillaEditar */
$zapatillaEditar = $zapatillaEditar ?? null;
?>
<section class="tarjeta">
    <h2><?= $zapatillaEditar ? 'Modificar zapatilla' : 'Agregar una zapatilla' ?></h2>
    <form method="post">
        <input type="hidden" name="accion" value="<?= $zapatillaEditar ? 'modificar' : 'agregar' ?>">
        <?php if ($zapatillaEditar): ?>
            <input type="hidden" name="id" value="<?= (int) $zapatillaEditar['id'] ?>">
        <?php endif; ?>
        <input type="text" name="icono" placeholder="Icono, por ejemplo" aria-label="Icono" value="<?= escapar($zapatillaEditar['icono'] ?? '') ?>" required>
        <input type="text" name="nombre" placeholder="Nombre, por ejemplo Nike" aria-label="Nombre de la zapatilla" value="<?= escapar($zapatillaEditar['nombre'] ?? '') ?>" required>
        <input type="url" name="imagen" placeholder="Link de imagen (opcional)" aria-label="Link de imagen" value="<?= escapar($zapatillaEditar['imagen'] ?? '') ?>">
        <button type="submit"><?= $zapatillaEditar ? 'Guardar cambios' : 'Agregar' ?></button>
        <?php if ($zapatillaEditar): ?>
            <a class="boton secundario" href="index.php">Cancelar</a>
        <?php endif; ?>
    </form>
</section>
