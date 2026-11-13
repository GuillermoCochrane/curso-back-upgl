<a  
  class="nav-link" 
  href="#<?= $slug ?? "marca-generica" ?>"
>
  <?= htmlspecialchars(ucfirst($nombre ?? "Marca Generica"), ENT_QUOTES, 'UTF-8') ?>
</a>