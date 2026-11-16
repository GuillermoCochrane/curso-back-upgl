<?php
  function render_links(array $marcas): void {
    foreach ($marcas ?? [] as $marca) {
        $template_path = __DIR__ . "/../../../partials/zapatillas/link_marcas";
        render($template_path,  $marca);
    }
  }