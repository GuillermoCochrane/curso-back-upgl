<?php
  $nav_items = [
    [
      "label" => "Inicio",
      "url" => "index.php",
      "link_styles" => "nav-link active",
      "isDropdown" => false,
    ],
    [
      "label" => "Productos",
      "url" => "productos.php",
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
      "url" => "contacto.php",
      "isDropdown" => false,
    ],
    [
      "label" => "Carrito",
      "url" => "carrito.php",
      "li_styles" => "nav-item ms-lg-3",
      "link_styles" => "btn btn-light text-dark",
      "icon" => "shopping-cart",
      "isDropdown" => false,
    ],
  ];

  function render_nav_items(array $nav_items = []): void {
    foreach ($nav_items as $nav_item) {
      // Decidimos el template según si es dropdown o no
      $template_name = $nav_item['isDropdown'] ? 'nav_dropdown' : 'nav_item';
      $template_path = __DIR__ . "/../../../../partials/nav/" . $template_name;
      render($template_path, $nav_item);
    }
  }