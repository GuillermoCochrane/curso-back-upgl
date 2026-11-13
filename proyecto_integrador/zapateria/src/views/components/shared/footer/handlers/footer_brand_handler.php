<?php
  foreach ($marcas ?? [] as $marca) {
    extract($marca);
    include __DIR__ . "/../../../../partials/footer/footer_link_item.php";
  }
?>