<?php
  $contact_items = [
    [
      "contact_icon" => "home",
      "contact_label" => "Dr Bruno 580, General Levalle.",
    ],
    [
      "contact_icon" => "envelope",
      "contact_label" => "info@zapateriacordon.com",
    ],
    [
      "contact_icon" => "phone",
      "contact_label" => "+ 54 9 3385 405049",
    ],
  ];

  function render_contact_items($contact_items=[]) {
    $template_path = __DIR__ . "/../../../../partials/footer/footer_contact_item";
    foreach ($contact_items as $contact_item) {
      render($template_path, $contact_item);
    }
  }