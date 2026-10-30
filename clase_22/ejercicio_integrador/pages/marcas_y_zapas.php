<?php if ($zapatillasPorMarca === []) { ?>
    <p class="text-body-secondary">No hay zapatillas cargadas.</p>
<?php } ?>

<?php foreach ($zapatillasPorMarca as $marca => $modelos) { ?>
    <div id="marca-<?php echo rawurlencode(strtolower($marca)); ?>" class="marca-seccion pb-5 mb-4">
        <h2 class="border-start border-4 border-warning ps-3 mb-4 fw-bold h3"><?php echo htmlspecialchars($marca, ENT_QUOTES, 'UTF-8'); ?></h2>
        <div class="row g-4 mb-5">
            <?php foreach ($modelos as $zapatilla) { ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                        <?php if ($zapatilla['imagen'] !== '') { ?>
                            <img src="<?php echo htmlspecialchars($zapatilla['imagen'], ENT_QUOTES, 'UTF-8'); ?>"
                                class="card-img-top p-3 bg-white" alt="Zapatilla <?php echo htmlspecialchars($zapatilla['nombre'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?php } else { ?>
                            <div class="card-img-top p-5 bg-white text-center text-body-secondary">Foto no disponible</div>
                        <?php } ?>
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="card-title fw-bold"><?php echo htmlspecialchars($zapatilla['nombre'], ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p class="card-text text-body-secondary small"><?php echo htmlspecialchars($zapatilla['icono'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                                data-bs-target="#detallesModal" data-zapatilla="<?php echo (int) $zapatilla['id']; ?>"
                                data-nombre="<?php echo htmlspecialchars($zapatilla['nombre'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-icono="<?php echo htmlspecialchars($zapatilla['icono'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-imagen="<?php echo htmlspecialchars($zapatilla['imagen'], ENT_QUOTES, 'UTF-8'); ?>">Ver Detalles</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
