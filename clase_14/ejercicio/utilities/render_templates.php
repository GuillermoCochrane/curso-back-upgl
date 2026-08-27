<?php
  function render_template(string $template, array $data = []){
    // extrae los de un array asociativo, donde las claves son los nombres de las variables y el valor es el valor de la misma
    extract($data);
    require "$template.php";
  }
?>