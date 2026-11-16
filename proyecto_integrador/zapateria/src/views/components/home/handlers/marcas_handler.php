<?php
  function render_marcas(array $marcas, array $zapatillas): void {
    foreach ($marcas ?? [] as $marca) {
      $template_path = __DIR__ . "/../home_section_marcas";
      $datos = array_merge($marca, ['zapatillas' => $zapatillas]);
      render($template_path,  $datos);
    }
  }
