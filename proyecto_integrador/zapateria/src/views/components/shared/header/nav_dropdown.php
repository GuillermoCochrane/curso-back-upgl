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
      foreach ($dropdown_items ?? [] as $dropdown_item) {
        $template_path = __DIR__."/../../../partials/nav/nav_dropdown_item";
        render($template_path, $dropdown_item);
      }
      ?>
  </ul>
</li>