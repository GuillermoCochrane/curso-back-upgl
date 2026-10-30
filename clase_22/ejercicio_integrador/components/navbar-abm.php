<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary py-3">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="../index.php">
      <img src="../img/logo.png" alt="Volver al inicio" height="64" class="rounded-circle">
      <p class="fw-bold mb-0">Alta, baja y Modificacion <br>Zapatos El Cordon</p>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAbm" aria-controls="navbarAbm" aria-expanded="false" aria-label="Abrir o cerrar navegación">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarAbm">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarMarcasAbm" role="button" data-bs-toggle="dropdown" aria-expanded="false">Marcas</a>
          <ul class="dropdown-menu" aria-labelledby="navbarMarcasAbm">
            <li><a class="dropdown-item" href="#"><?php echo htmlspecialchars($marca1 ?? 'Marca 1', ENT_QUOTES, 'UTF-8'); ?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo htmlspecialchars($marca2 ?? 'Marca 2', ENT_QUOTES, 'UTF-8'); ?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo htmlspecialchars($marca3 ?? 'Marca 3', ENT_QUOTES, 'UTF-8'); ?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo htmlspecialchars($marca4 ?? 'Marca 4', ENT_QUOTES, 'UTF-8'); ?></a></li>
          </ul>
        </li>
        <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Nike, flecha, topper" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      </ul>
    </div>
  </div>
</nav>