<?php
  function render_acciones(array $acciones): void {
    $template_botones = __DIR__ . "/../../../partials/zapatillas/action_button";
    foreach ($acciones as $accion){
      render($template_botones, $accion);
    }
  }

  function render_detalle_zapatilla(array $zapatilla, array $alerta): void {
    if (!empty($alerta['message'])) {
      $template_path = __DIR__ . "/../../../partials/alert/alert";
      render($template_path, $alerta);
      return; 
    }

    if (!empty($zapatilla)) {
      $template_detalle = __DIR__ . "/../../shared/detalle_zapatilla/detalle_zapatilla";
      render($template_detalle, $zapatilla);

      $acciones = [
        [
          "recurso"   => "zapatillas",
          "accion"    => "editar",
          "id"        => $zapatilla['id'] ?? "0",
          "btn_class" => "btn-primary",
          "texto"     => "Editar",
        ],
        [
          "recurso"   => "zapatillas",
          "accion"    => "eliminar",
          "id"        => $zapatilla['id'] ?? "0",
          "btn_class" => "btn-danger",
          "texto"     => "Eliminar",
        ],
      ];

      $template_acciones = __DIR__ . "/../../shared/navbar_acciones/navbar_acciones";
      render($template_acciones, ['acciones' => $acciones]);
    }
  }