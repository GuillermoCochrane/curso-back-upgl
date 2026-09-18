<?php

/*
$zapatillas ["marca"]["modelo"]["descripcion"] = "El icono del basquetbol de los 80, que se creó para la cancha pero conquistó las calles...";
*/
require_once("database/data.php");

foreach($zapatillas as $zapatilla) {
?>

<div id="nike" class="marca-seccion pb-5 mb-4">
    <h2 class="border-start border-4 border-warning ps-3 mb-4 fw-bold h3"><?php echo $zapatilla["marca"]["nombre"]; ?>
    </h2>
    <div class="row g-4 mb-5">
        <?php foreach ($zapatillas as $zapatilla) { ?>
            <div class="col-sm-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                <img src="<?php echo $zapatilla["marca"]["imagen"]; ?>"
                    class="card-img-top p-3 bg-white" alt="<?php echo $zapatilla["marca"]["alt_imagen"]; ?>">
                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold"><?php echo $zapatilla["marca"]["modelo"]; ?></h5>
                    <p class="card-text text-body-secondary small"><?php echo $zapatilla["marca"]["descripcion"]; ?></p>
                    <button class="btn btn-outline-dark rounded-pill mt-auto" data-bs-toggle="modal"
                        data-bs-target="#detallesModal" data-zapatilla="nike-dunk-low">Ver Detalles</button>
                </div>
                </div>
            </div>
           <?php }
           }?>
           
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