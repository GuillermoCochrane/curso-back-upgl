<div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-header px-4 py-3 bg-body-tertiary">
                <h2 class="modal-title fs-5 fw-bold text-primary" id="detallesModalLabel">Conocé tu próximo par</h2>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6">
                        <div class="ratio ratio-1x1 bg-white rounded-4 border overflow-hidden">
                            <img id="modal-imagen" class="w-100 h-100 object-fit-contain p-3" alt="">
                            <div id="modal-imagen-error" class="d-none align-items-center justify-content-center text-secondary text-center p-4" role="status">Foto no disponible</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="badge text-bg-warning rounded-pill mb-3">Detalles del modelo</span>
                        <h3 id="modal-nombre" class="h4 fw-bold text-primary mb-2"></h3>
                        <p id="modal-precio" class="fs-2 fw-bold text-primary mb-3"></p>
                        <p id="modal-descripcion" class="text-body-secondary mb-4"></p>
                        <dl class="mb-0 border-top pt-3">
                            <dt class="small text-uppercase text-primary mb-2">Talles disponibles</dt>
                            <dd id="modal-talles" class="mb-3"></dd>
                            <dt class="small text-uppercase text-primary mb-2">Colores</dt>
                            <dd id="modal-colores" class="mb-0"></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-body-tertiary px-4">
                <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">Seguir explorando</button>
            </div>
        </div>
    </div>
</div>