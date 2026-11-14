<?php
  foreach ($marcas ?? [] as $marca) {
    extract($marca);
    include __DIR__ . "/../home_section_marcas.php";
  }
