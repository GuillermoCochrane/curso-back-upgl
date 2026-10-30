<?php
// ==============================================================================
// COMPONENTE: Lista de zapatillas (Sección con Grid)
// ==============================================================================
// Este componente muestra la sección completa de zapatillas guardadas.
// Itera sobre la lista $zapatillasVisibles y para cada zapatilla llama a renderizarCardzapatilla($zapatilla).
/** @var array $zapatillas */
/** @var array $zapatillasVisibles */
$zapatillas ??= [];
$zapatillasVisibles ??= [];
?>
<section class="tarjeta">
    <h2>zapatillas guardadas (<?= count($zapatillas) ?>)</h2>
    <?php if ($zapatillasVisibles === []): ?>
        <p>No hay zapatillas que coincidan con la búsqueda.</p>
    <?php else: ?>
        <div class="grid-zapatillas">
            <?php foreach ($zapatillasVisibles as $zapatilla): ?>
                <?php renderizarCardzapatilla($zapatilla); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
