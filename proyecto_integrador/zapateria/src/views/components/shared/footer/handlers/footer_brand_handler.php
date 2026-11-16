<?php
  function render_footer_brand_items(array $marcas=[]):void {
    $template_path = __DIR__ . "/../../../../partials/footer/footer_link_item";
    foreach ($marcas as $marca) {
      render($template_path, $marca);
    }
  }
?>