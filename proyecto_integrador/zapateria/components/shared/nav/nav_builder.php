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
      "dropdown_items" => $zapatillas ?? [],
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

  function render_nav_items($nav_item=[]) {
    extract($nav_item);
    if ($isDropdown) {
      include("components/shared/nav/nav_dropdown.php");
    } else {
      include("components/shared/nav/nav_item.php");
    }
  }

  foreach ($nav_items as $nav_item) {
    render_nav_items($nav_item);
  }
?>