<?php
  // Definimos la configuración de todos los campos del formulario
  $campos = [
    [
      "type" => "text",
      "name" => "nombre",
      "label" => "Modelo / Nombre *",
      "col_class" => "col-md-6",
      "required" => true
    ],
    [
      "type" => "select",
      "name" => "marcaID",
      "label" => "Marca *",
      "col_class" => "col-md-6",
      "required" => true,
      "options" => $marcas ?? [],
      "default_option" => "una marca",
      "handler" => "/../../../components/zapatillas/handlers/zapatillas_select_handler.php"
    ],
    [
      "type" => "number",
      "name" => "precio",
      "label" => "Precio ($) *",
      "col_class" => "col-md-6",
      "required" => true,
      "min" => 0
    ],
    [
      "type" => "number",
      "name" => "stock",
      "label" => "Stock *",
      "col_class" => "col-md-6",
      "required" => true,
      "min" => 0
    ],
    [
      "type" => "text",
      "name" => "talles",
      "label" => "Talles",
      "col_class" => "col-md-6",
      "placeholder" => "Ej: 36, 37, 38"
    ],
    [
      "type" => "text",
      "name" => "colores",
      "label" => "Colores",
      "col_class" => "col-md-6",
      "placeholder" => "Ej: Blanco, Negro"
    ],
    [
      "type" => "url",
      "name" => "imagen",
      "label" => "URL de la Imagen",
      "col_class" => "col-12",
      "placeholder" => "https://..."
    ],
    [
      "type" => "textarea",
      "name" => "descripcion",
      "label" => "Descripción",
      "col_class" => "col-12",
      "rows" => 3
    ],
    [
      "type" => "buttons",
      "entidad" => "Zapatilla",
      "col_class" => "col-12 mt-4"
    ]
  ];
  
  function render_form_zapatilla(array $campos = []): void {
    $relative_path = "/../../../partials/form/";
    foreach ($campos as $campo) {
      
      // Decidimos la ruta del template según el tipo de campo
      $template_path = match ($campo['type']) {
        'text', 'number', 'url'   => __DIR__ . $relative_path . "input",
        'select'                  => __DIR__ . "/../../shared/select/select",
        'textarea'                => __DIR__ . $relative_path . "textarea",
        'buttons'                 => __DIR__ . $relative_path . "buttons",
        default                  => null
      };

      // Si la ruta existe, renderizamos
      if ($template_path) {
        render($template_path, $campo);
      }
    }
  }
