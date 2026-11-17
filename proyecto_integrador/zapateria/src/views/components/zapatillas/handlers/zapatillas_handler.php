<?php
  function render_zapatillas(array $zapatillas): void {
    foreach ($zapatillas as $zapatilla) {
        $template_path = __DIR__ . "/../../../partials/zapatillas/card_zapatillas";
        render($template_path, $zapatilla);
    }
  }
