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

  function render_contact_items($contact_item=[]) {
    extract($contact_item);
    include("components/shared/footer/footer_contact_item.php");
  }

  foreach ($contact_items as $contact_item) {
    render_contact_items($contact_item);
  }
?>