<?php
  $social_items = [
    [
      "social_icon" => "facebook",
      "social_link" => "#!",
    ],
    [
      "social_icon" => "instagram",
      "social_link" => "#!",
    ],
    [
      "social_icon" => "whatsapp",
      "social_link" => "#!",
    ],
  ];

  function render_social_items(array $social_items=[]):void {
    $template_path = __DIR__ . "/../../../../partials/footer/footer_social_item";
    foreach ($social_items as $social_item) {
      render($template_path, $social_item);
    }
  }