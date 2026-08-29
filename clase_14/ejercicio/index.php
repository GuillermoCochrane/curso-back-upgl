<?php 
  $title = 'Home del sitio';

  $internal_links = [
    [
      "page_link" => "./",
      "page_tag" => "Home",
      "active" => true,
    ],
    [
      "page_link" => "pages/pagina1/",
      "page_tag" => "PAGINA 1",
      "active" => false,
    ],
    [
      "page_link" => "pages/pagina2/",
      "page_tag" => "PAGINA 2",
      "active" => false,
    ]
  ];

  include 'pages/home/template.php';

?>