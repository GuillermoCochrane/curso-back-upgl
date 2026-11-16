<?php
  function render_zapatillas(array $zapatillas, int $marca_id): void {
    // Filtramos acá adentro, usando los parámetros
    $zapatillasDeMarca = array_filter($zapatillas, function($zapatilla) use ($marca_id) {
        return $zapatilla['marca_id'] === $marca_id;
    });

    foreach ($zapatillasDeMarca as $zapatilla) {
        $template_path = __DIR__ . "/../../../partials/zapatillas/card_zapatillas";
        render($template_path, $zapatilla);
    }
  }
