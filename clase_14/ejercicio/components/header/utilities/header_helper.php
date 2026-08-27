<?php
  // Array de enlaces externos
  $external_links = [
    [
      "link" => "https://www.facebook.com/",
      "tag" => "IR A FACEBOOK"
    ],
    [
      "link" => "https://www.instagram.com",
      "tag" => "IR A INSTAGRAM"
    ],
    [
      "link" => "https://www.farmearaura.com",
      "tag" => "IR A FARMEAR AURA"
    ]
  ];

  function render_dropdown($links) {
    foreach ($links as $link) {
      extract($link);
      include __DIR__ . '/../dropdown_item.php';
    }
  }
?>