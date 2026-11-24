<?php
  function render_detalle_zapatilla(array $zapatilla, array $alerta): void {
    if (!empty($alerta['message'])) {
      $template_path = __DIR__ . "/../../partials/alert/alert";
      render($template_path, $alerta);
      return; 
    }

    if (!empty($zapatilla)) {
      $template_detalle = __DIR__ . "/../../../shared/detalle_zapatilla/detalle_zapatilla";
      render($template_detalle, $zapatilla);

      $template_acciones = __DIR__ . "/../../../shared/navbar_acciones/navbar_acciones";
      render($template_acciones, $zapatilla);
    }
  }