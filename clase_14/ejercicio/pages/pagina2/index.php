<?php 
  $title = 'PAGINA 2';

  $internal_links = [
    [
      "page_link" => "../../",
      "page_tag" => "Home",
      "active" => false,
    ],
    [
      "page_link" => "../pagina1/",
      "page_tag" => "PAGINA 1",
      "active" => false,
    ],
    [
      "page_link" => "./",
      "page_tag" => "PAGINA 2",
      "active" => true,
    ]
  ];

  include './template.php'; 

?>