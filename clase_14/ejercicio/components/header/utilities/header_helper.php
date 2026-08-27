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

  function render_dropdown($links) {
    foreach ($links as $link) {
      extract($link);
      if ($is_link) {
        include __DIR__ . '/../dropdown_link.php';
      } else {
        include __DIR__ . '/../dropdown_divider.php';
      }
    }
  }
?>