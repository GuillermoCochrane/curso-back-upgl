<?php
require_once("database/data.php");
array_pop($zapatillas["marca"]);
$zapatillas["marca"]["Flecha"] = [
            "flecha-veloz-rapidisima" => [
                "modelo" => "Flecha Veloz",
                "descripcion" => "El icono del basquetbol de los 80, creado para la cancha y convertido en un clásico urbano.",
                "imagen" => "data:image/jpeg;base64,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",
                "alt_imagen" => "Zapatilla Nike Dunk High",
            ],
        ];
array_shift($zapatillas["marca"]);

foreach ($zapatillas["marca"] as $marca => $modelos) {
?>
    <div id="<?php echo htmlspecialchars($marca); ?>" class="marca-seccion pb-5 mb-4">
    <h2 class="border-start border-4 border-warning ps-3 mb-4 fw-bold h3"><?php echo $marca; ?></h2>
    <div class="row g-4 mb-5">
        <?php foreach ($modelos as $idZapatilla => $zapatilla) { ?>
            <div class="col-sm-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                <img src="<?php echo $zapatilla["imagen"]; ?>"
                    class="card-img-top p-3 bg-white" alt="<?php echo $zapatilla["alt_imagen"]; ?>">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold"><?php echo $zapatilla["modelo"]; ?></h5>
                    <p class="card-text text-body-secondary small"><?php echo $zapatilla["descripcion"]; ?></p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="<?php echo $idZapatilla; ?>">Ver Detalles</button>
                </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
           
<!--         <div class="col-sm-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/1460993-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">Air Jordan 1 Low SE</h5>
                    <p class="card-text text-body-secondary small">Da tu máximo esfuerzo con estos AJ1 de edición
                        especial. ...</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="air-jordan-1-low-se">Ver Detalles</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/1381241-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">Nike Pegasus Trail 5</h5>
                    <p class="card-text text-body-secondary small">Despliega tus alas y observa lo que te depara la
                        naturaleza mientras recorres
                        caminos de tierra con los Peg Trail 5....</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="nike-pegasus-trail-5">Ver Detalles</button>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- <div id="adidas" class="marca-seccion pb-5 mb-4">
    <?php
    $marca = "Adidas";
    include("pages/titulo_marca_zapa.php");
    $imagen_zapatilla_1 = "https://nikearprod.vtexassets.com/arquivos/ids/378649-1200-1200?width=1200&height=1200&aspect=true";
    $alt_imagen_1 = "Zapatilla Adidas";
    $titulo_zapatilla_1 = "Adidas Ultraboost";
    $descripcion_zapatilla_1 = "Zapatillas de running con amortiguación superior para máxima comodidad en cada paso.";
    $data_zapatilla_1 = "adidas-ultraboost";
    ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="<?php echo $imagen_zapatilla_1; ?>" class="card-img-top p-3 bg-white"
                    alt="<?php echo $alt_imagen_1; ?>">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold"><?php echo $titulo_zapatilla_1; ?></h5>
                    <p class="card-text text-body-secondary small"><?php echo $descripcion_zapatilla_1; ?></p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="<?php echo $data_zapatilla_1; ?>">Ver
                        Detalles</button>
                </div>
            </div>
        </div>
        <div class="col">
            <?php
            $imagen_zapatilla_1 = "https://nikearprod.vtexassets.com/arquivos/ids/1460993-1200-1200?width=1200&height=1200&aspect=true";
            $alt_imagen_1 = "Zapatilla Adidas";
            $titulo_zapatilla_1 = "Adidas Stan Smith";
            $descripcion_zapatilla_1 = ">Clásicas zapatillas blancas con diseño atemporal,
                        perfectas para el día a día.";
            $data_zapatilla_1 = "adidas-stan-smith";
            ?>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="<?php echo $imagen_zapatilla_1; ?>" class="card-img-top p-3 bg-white"
                            alt="<?php echo $alt_imagen_1; ?>">
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="card-title fw-bold"><?php echo $titulo_zapatilla_1; ?></h5>
                            <p class="card-text text-body-secondary small"><?php echo $descripcion_zapatilla_1; ?></p>
                            <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                                data-bs-target="#detallesModal" data-zapatilla="<?php echo $data_zapatilla_1; ?>">Ver
                                Detalles</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="https://nikearprod.vtexassets.com/arquivos/ids/1381241-1200-1200?width=1200&height=1200&aspect=true"
                        class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="card-title fw-bold">Adidas NMD</h5>
                        <p class="card-text text-body-secondary small">Zapatillas urbanas con tecnología Boost para un
                            estilo moderno y cómodo.</p>
                        <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                            data-bs-target="#detallesModal" data-zapatilla="adidas-nmd">Ver Detalles</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="topper" class="marca-seccion pb-5 mb-4">
    <?php
    $marca = "Topper";
    include("pages/titulo_marca_zapa.php"); ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/378649-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">Topper Runner</h5>
                    <p class="card-text text-body-secondary small">Zapatillas ligeras ideales para corredores
                        diarios con excelente ventilación.
                    </p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="topper-runner">Ver Detalles</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/1460993-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">Topper Classic</h5>
                    <p class="card-text text-body-secondary small">Diseño clásico y versátil para uso cotidiano, con
                        materiales duraderos.</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="topper-classic">Ver Detalles</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/1381241-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">Topper Sport</h5>
                    <p class="card-text text-body-secondary small">Zapatillas deportivas multifuncionales para
                        actividades al aire libre.</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="topper-sport">Ver Detalles</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="newbalance" class="marca-seccion pb-5 mb-4">
    <?php
    $marca = "New Balance";
    include("pages/titulo_marca_zapa.php"); ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/378649-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">NewBalance 574</h5>
                    <p class="card-text text-body-secondary small">Zapatillas icónicas con estilo retro y comodidad
                        para el uso diario.</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="newbalance-574">Ver Detalles</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/1460993-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">NewBalance 990</h5>
                    <p class="card-text text-body-secondary small">Modelo premium con amortiguación avanzada y
                        diseño elegante.</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="newbalance-990">Ver Detalles</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/1381241-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">NewBalance FuelCell</h5>
                    <p class="card-text text-body-secondary small">Zapatillas de alto rendimiento para atletas con
                        energía de retorno.</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="newbalance-fuelcell">Ver Detalles</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="jaguar" class="marca-seccion pb-5 mb-4">
    <?php
    $marca = "Jaguar";
    include("pages/titulo_marca_zapa.php"); ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/378649-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">Jaguar Speed</h5>
                    <p class="card-text text-body-secondary small">Zapatillas rápidas y ligeras para competiciones
                        de velocidad.</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="jaguar-speed">Ver Detalles</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/1460993-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">Jaguar Comfort</h5>
                    <p class="card-text text-body-secondary small">Diseñadas para máxima comodidad durante todo el
                        día.</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="jaguar-comfort">Ver Detalles</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="https://nikearprod.vtexassets.com/arquivos/ids/1381241-1200-1200?width=1200&height=1200&aspect=true"
                    class="card-img-top p-3 bg-white" alt="Zapatilla Nike">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold">Jaguar Elite</h5>
                    <p class="card-text text-body-secondary small">Zapatillas premium para atletas de élite con
                        tecnología avanzada.</p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="jaguar-elite">Ver Detalles</button>
                </div>
            </div>
        </div>
    </div>
</div> -->
