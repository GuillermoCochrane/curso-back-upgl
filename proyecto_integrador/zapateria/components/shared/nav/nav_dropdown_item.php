<li>
  <a class="dropdown-item" href="#<?= $marca ?? "marca-generica" ?>">
    <?= htmlspecialchars(ucfirst($marca ?? "Marca Generica"), ENT_QUOTES, 'UTF-8'); ?>
  </a>
</li>