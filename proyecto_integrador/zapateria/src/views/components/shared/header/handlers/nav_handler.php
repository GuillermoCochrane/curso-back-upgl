<?php
  $nav_items = [
    [
      "label" => "Inicio",
      "url" => BASE_PATH."/",
      "link_styles" => "nav-link active",
      "isDropdown" => false,
    ],
    [
      "label" => "Productos",
      "url" => BASE_PATH."/pages/zapatillas",
      "isDropdown" => false,
    ],
    [
      "label" => "Marcas",
      "id" => "navbarMarcas",
      "isDropdown" => true,
      "dropdown_items" => $marcas ?? [],
    ],
    [
      "label" => "Contacto",
      "url" => BASE_PATH."/pages/marcas",
      "isDropdown" => false,
    ],
    [
      "label" => "Carrito",
      "url" => BASE_PATH."/",
      "li_styles" => "nav-item ms-lg-3",
      "link_styles" => "btn btn-light text-dark",
      "icon" => "shopping-cart",
      "isDropdown" => false,
    ],
  ];

  function render_nav_items(array $nav_items = []): void {
    foreach ($nav_items as $nav_item) {
      // Decidimos el template según si es dropdown o no
      $template_item = "/../../../../partials/nav/nav_item";
      $template_dropdown = "/../nav_dropdown";
      $template_name = $nav_item['isDropdown'] ? $template_dropdown : $template_item;
      $template_path = __DIR__ . $template_name;
      render($template_path, $nav_item);
    }
  }