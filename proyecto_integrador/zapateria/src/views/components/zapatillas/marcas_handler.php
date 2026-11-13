<?php
  foreach ($marcas ?? [] as $marca) {
    extract($marca);
    include __DIR__ . "/section_marcas.php";
  }
