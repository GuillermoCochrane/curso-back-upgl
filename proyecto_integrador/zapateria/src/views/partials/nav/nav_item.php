<li class="nav-item <?= escapar($li_styles ?? "") ?>">
  <a 
    class="<?= !empty($link_styles) ? escapar($link_styles) : "nav-link" ?>"
    href="<?= $url ?? "#" ?>"
  >
    <?php if (isset($icon)) { ?>
      <i class="fas fa-<?= escapar($icon) ?> me-1"></i>
    <?php } ?>
    <?= escapar(ucfirst($label ?? "Navegación")); ?>
  </a>
</li>