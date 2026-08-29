<?php 
  $title = 'PAGINA 1';

  $internal_links = [
    [
      "page_link" => "../../",
      "page_tag" => "Home",
      "active" => false,
    ],
    [
      "page_link" => "./",
      "page_tag" => "PAGINA 1",
      "active" => true,
    ],
    [
      "page_link" => "../pagina2/",
      "page_tag" => "PAGINA 2",
      "active" => false,
    ]
  ];

  include './template.php'; 

?>