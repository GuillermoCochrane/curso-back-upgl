<?php
  foreach (isset($zapatillas) ? $zapatillas : [] as $zapatilla) {
    extract($zapatilla);
    include("components/section_marcas.php");
  }
?>
