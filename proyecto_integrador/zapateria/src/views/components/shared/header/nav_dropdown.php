<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle"
    href="#"
    id="<?= $id ?? "navbarMarcas" ?>"
    role="button"
    data-bs-toggle="dropdown"
    aria-expanded="false"
  >
    <?= htmlspecialchars(ucfirst($label ?? "Marcas"), ENT_QUOTES, 'UTF-8'); ?>
  </a>

  <ul class="dropdown-menu" aria-labelledby="navbarMarcas">
    <?php 
      include __DIR__."/handlers/nav_dropdown_handler.php";
      render_nav_dropdown_items($dropdown_items ?? []);
    ?>
  </ul>
</li>