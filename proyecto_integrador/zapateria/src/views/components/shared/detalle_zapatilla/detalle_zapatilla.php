<div class="row g-4 align-items-center">
  <section class="col-md-6">
    <figure class="ratio ratio-1x1 bg-white rounded-4 border overflow-hidden">
      <?php 
        $fallback_path = BASE_PATH . "/public/img/fallback.webp";
        $img_src = !empty($imagen) ? $imagen : $fallback_path; 
      ?>
      <img
        id="modal-imagen"
        class="w-100 h-100 object-fit-contain p-3"
        src="<?= $img_src ?>"
        alt="<?= escapar($nombre ?? '') ?>"
        onerror="this.onerror=null; this.src='<?= escapar($fallback_path) ?>';"
      >
      <div
        id="modal-imagen-error"
        class="d-none align-items-center justify-content-center text-secondary text-center p-4"
        role="status"
      >
        Foto no disponible
      </div>
    </figure>
  </section>

  <section class="col-md-6">
    <strong class="badge text-bg-warning rounded-pill mb-3">Detalles del modelo</strong>

    <h3 id="modal-nombre" class="h4 fw-bold text-primary mb-2">
      <?= escapar($nombre ?? '') ?>
    </h3>

    <p id="modal-precio" class="fs-2 fw-bold text-primary mb-3">
      $<?= escapar($precio ?? '') ?>
    </p>

    <p id="modal-descripcion" class="text-body-secondary mb-4">
      <?= escapar($descripcion ?? '') ?>
    </p>

    <dl class="mb-0 border-top pt-3">
      <dt class="small text-uppercase text-primary mb-2">Talles disponibles</dt>
      <dd id="modal-talles" class="mb-3">
        <?=  escapar($talles ?? '') ?>
      </dd>

      <dt class="small text-uppercase text-primary mb-2">Colores</dt>
      <dd id="modal-colores" class="mb-0">
        <?= escapar($colores ?? '') ?>
      </dd>
    </dl>
  </section>
</div>