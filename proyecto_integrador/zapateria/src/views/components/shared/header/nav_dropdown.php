<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle"
    href="#"
    id="<?= escapar($id ?? 'navbarMarcas') ?>"
    role="button"
    data-bs-toggle="dropdown"
    aria-expanded="false"
  >
    <?= escapar(ucfirst($label ?? 'Marcas')) ?>
  </a>

  <ul class="dropdown-menu" aria-labelledby="<?= escapar($id ?? 'navbarMarcas') ?>">
    <?php 
      include_once __DIR__ . '/handlers/nav_dropdown_handler.php';
      render_nav_dropdown_items($dropdown_items ?? []);
    ?>
  </ul>
</li>