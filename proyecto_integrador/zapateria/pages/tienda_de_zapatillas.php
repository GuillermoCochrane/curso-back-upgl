<div class="hero-tienda bg-dark bg-gradient text-white overflow-hidden">
  <div class="container py-5">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 text-center text-lg-start">
        <span class="badge rounded-pill text-bg-warning px-3 py-2 mb-4">COLECCIÓN 2025</span>
        <h1 class="display-2 fw-bold text-white mb-3 titulo-tienda">
          Pisá fuerte,
          <br>
          <span class="text-warning">elegí tu estilo</span>
        </h1>
        <p class="lead text-white-50 mb-4">Zapatillas que combinan comodidad, actitud y personalidad.</p>
        <a
          href="#top" 
          class="btn btn-warning btn-lg rounded-pill fw-semibold px-4"
        >
          Explorar colección 
          <span aria-hidden="true">
            &rarr;
          </span>
        </a>
      </div>
      <div class="col-lg-6 text-center hero-zapatilla">
        <div class="ratio ratio-4x3 rounded-5 bg-light shadow overflow-hidden">
          <model-viewer 
            class="w-100 h-100"
            id="hero-zapatilla-3d" src="img/models/zapatilla.glb"
            alt="Zapatilla en 3D; arrastrá para verla desde distintos ángulos" 
            auto-rotate
            auto-rotate-delay="0" 
            rotation-per-second="25deg" 
            camera-controls 
            disable-zoom 
            disable-pan
            touch-action="pan-y" 
            camera-orbit="-35deg 75deg 105%" 
            shadow-intensity="1" 
            exposure="1.1"
            loading="eager" 
            interaction-prompt="none"
          >
            <div 
              slot="poster"
              class="d-flex flex-column align-items-center justify-content-center w-100 h-100 bg-light text-dark"
            >
              <span class="display-1" aria-hidden="true">👟</span>
              <small id="hero-zapatilla-estado" role="status">Cargando zapatilla 3D…</small>
            </div>
          </model-viewer>
        </div>
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mt-3">
          <small class="text-white-50">Arrastrá para explorar</small>
          <button 
            id="hero-zapatilla-giro" 
            type="button" 
            class="btn btn-sm btn-outline-light rounded-pill"
            aria-controls="hero-zapatilla-3d" 
            disabled
          >
            Pausar giro
          </button>
        </div>
        <a 
          class="d-block small link-light link-opacity-50 mt-3"
          href="https://github.com/KhronosGroup/glTF-Sample-Assets/tree/main/Models/MaterialsVariantsShoe"
          target="_blank" 
          rel="noopener noreferrer"
        >
          Modelo 3D: Shopify · CC BY 4.0
        </a>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg bg-white border-bottom py-3" aria-label="Navegación por marcas">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#top">SNEAKERS</a>
    <button 
      class="navbar-toggler" 
      type="button" 
      data-bs-toggle="collapse" 
      data-bs-target="#menuMarcas"
      aria-controls="menuMarcas" 
      aria-expanded="false" 
      aria-label="Abrir menú"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menuMarcas">
      <div class="navbar-nav ms-auto text-center gap-lg-3">
        <?php
          foreach ($zapatillas ?? [] as $zapatilla) {
            extract($zapatilla);
            include("components/zapatillas/link_marcas.php");
          }
        ?>
      </div>
    </div>
  </div>
</nav>
<main id="top" class="container py-5">
  <div class="mb-5">
    <span class="text-uppercase small fw-semibold text-secondary">
      Encontrá tu próximo par
    </span>
    <h2 class="display-6 fw-bold mt-2">Un estilo para cada paso.</h2>
    <p class="text-body-secondary mb-0">Explorá nuestras marcas y conocé los detalles de cada modelo.</p>
  </div>
  <?php include_once("components/zapatillas/marcas_y_zapas.php"); ?>
</main>

<!-- Modal de detalles de zapatilla -->

<?php include_once("components/zapatillas/zapatillas_modal.php"); ?>



<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
  crossorigin="anonymous">
</script>
<script src="script/carga_zapatillas.js"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/@google/model-viewer@4.1.0/dist/model-viewer.min.js"></script>
<script src="script/hero-zapatilla.js" defer></script>