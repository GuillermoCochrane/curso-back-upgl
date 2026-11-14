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
        <?php include __DIR__ . "/handlers/links_handler.php"; ?>
      </div>
    </div>
  </div>
</nav>