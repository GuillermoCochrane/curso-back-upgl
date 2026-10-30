<?php
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
