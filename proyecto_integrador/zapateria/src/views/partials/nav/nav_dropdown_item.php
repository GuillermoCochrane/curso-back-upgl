<li>
  <a class="dropdown-item" href="#<?= $nombre ?? "marca-generica" ?>">
    <?= htmlspecialchars(ucfirst($nombre ?? "Marca Generica"), ENT_QUOTES, 'UTF-8'); ?>
  </a>
</li>