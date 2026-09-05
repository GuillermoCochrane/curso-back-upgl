    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #a7590c;">
  <div class="container">

    <!-- Marca -->
    <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="index.php">
      <img src="./img/logo.png" alt="Volver al inicio" height="64" class="rounded-circle">
      <p class="fw-bold mb-0">Zapatos <br>El Cordon</p>
    </a>

    <!-- Botón responsive -->
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCordón"
            aria-controls="navbarCordón"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarCordón">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" href="index.php">
            Inicio
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="productos.php">
            Productos
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle"
             href="#"
             id="navbarMarcas"
             role="button"
             data-bs-toggle="dropdown"
             aria-expanded="false">
            Marcas
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarMarcas">
            <li>
              <a class="dropdown-item" href="#">
                <?php echo htmlspecialchars($marca1 ?? 'Marca 1', ENT_QUOTES, 'UTF-8'); ?>
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="#">
                <?php echo htmlspecialchars($marca2 ?? 'Marca 2', ENT_QUOTES, 'UTF-8'); ?>
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="#">
                <?php echo htmlspecialchars($marca3 ?? 'Marca 3', ENT_QUOTES, 'UTF-8'); ?>
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="#">
                <?php echo htmlspecialchars($marca4 ?? 'Marca 4', ENT_QUOTES, 'UTF-8'); ?>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="contacto.php">
            Contacto
          </a>
        </li>

        <li class="nav-item ms-lg-3">
          <a class="btn btn-light text-dark"
             href="carrito.php">
            <i class="fas fa-shopping-cart me-1"></i>
            Carrito
          </a>
        </li>

      </ul>
    </div>

  </div>
</nav>