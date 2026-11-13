<?php
  foreach ($marcas ?? [] as $marca) {
    extract($marca);
    include __DIR__ . "/../../../partials/zapatillas/link_marcas.php";
  }
