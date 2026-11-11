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

  function render_social_items($social_item=[]) {
    extract($social_item);
    include("components/shared/footer/footer_social_item.php");
  }

  foreach ($social_items as $social_item) {
    render_social_items($social_item);
  }
?>