<?php
  foreach ( $zapatillas ?? [] as $zapatilla) {
    extract($zapatilla);
    include __DIR__ . "/section_marcas.php";
  }
?>
