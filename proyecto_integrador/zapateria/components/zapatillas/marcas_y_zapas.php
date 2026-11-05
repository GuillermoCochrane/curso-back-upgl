<?php
  foreach ( $zapatillas ?? [] as $zapatilla) {
    extract($zapatilla);
    include("components/zapatillas/section_marcas.php");
  }
?>
