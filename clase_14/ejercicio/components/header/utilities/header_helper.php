<?php
  // Array de enlaces externos
  $external_links = [
    [
      "link" => "https://www.facebook.com/",
      "tag" => "IR A FACEBOOK",
      "is_link" => true
    ],
    [
      "link" => "https://www.instagram.com",
      "tag" => "IR A INSTAGRAM",
      "is_link" => true
    ],
    [
      "is_link" => false,
    ],
    [
      "link" => "https://www.farmearaura.com",
      "tag" => "IR A FARMEAR AURA",
      "is_link" => true
    ]
  ];

  require_once __DIR__ . "/../../../utilities/render_templates.php";

  $nav_item = __DIR__ . "/../nav_item";
  $dropdown_link = __DIR__ . "/../dropdown_link";
  $dropdown_divider = __DIR__ . "/../dropdown_divider";

  function render_navbar(array $links, string $component) {
    foreach ($links as $link) {
      render_template($component, $link);
    }
  }

  function render_dropdown(array $links, string $dropdown_link, string $divider) {
    foreach ($links as $link) {
      if (isset($link['is_link']) && $link['is_link']) {
        render_template($dropdown_link, $link);
      } else {
        render_template($divider);
      }
    }
  }

?>