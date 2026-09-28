<?php
// ==============================================================================
// COMPONENTE: Lista de Frutas (Sección con Grid)
// ==============================================================================
// Este componente muestra la sección completa de frutas guardadas.
// Itera sobre la lista $frutasVisibles y para cada fruta llama a renderizarCardFruta($fruta).
/** @var array $frutas */
/** @var array $frutasVisibles */
$frutas = $frutas ?? [];
$frutasVisibles = $frutasVisibles ?? [];
?>
<section class="tarjeta">
    <h2>Frutas guardadas (<?= count($frutas) ?>)</h2>
    <?php if ($frutasVisibles === []): ?>
        <p>No hay frutas que coincidan con la búsqueda.</p>
    <?php else: ?>
        <div class="grid-frutas">
            <?php foreach ($frutasVisibles as $fruta): ?>
                <?php renderizarCardFruta($fruta); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
