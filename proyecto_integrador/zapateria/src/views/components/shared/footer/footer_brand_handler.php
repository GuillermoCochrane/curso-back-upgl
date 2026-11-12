<?php
  foreach ($zapatillas ?? [] as $zapatilla) {
    extract($zapatilla);
    include __DIR__ . "/../../../partials/footer/footer_link_item.php";
  }
?>