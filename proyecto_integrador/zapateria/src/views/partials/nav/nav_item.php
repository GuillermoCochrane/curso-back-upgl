<li class="nav-item <?= $li_styles ?? "" ?>">
  <a 
    class="<?= isset($link_styles) ? "$link_styles" : "nav-link" ?>"
    href="<?= $url ?? "#" ?>"
  >
    <?php if (isset($icon)) { ?>
      <i class="fas fa-<?= $icon ?> me-1"></i>
    <?php } ?>
    <?= htmlspecialchars(ucfirst($label ?? "Navegación"), ENT_QUOTES, 'UTF-8'); ?>
  </a>
</li>