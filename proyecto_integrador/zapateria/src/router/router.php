<?php
  require_once __DIR__ . "/../utilities/utilities.php";
  require_once __DIR__ . "/../services/SanitizationServices.php";

  $uri = sanitaizarURI();
  $parametro = obtenerParametro($uri, 1);

  $router = match ($parametro){
    '/' => 'Home',
    '/zapatillas' => 'Zapatillas',
    '/marcas' => 'Marcas',
    default => "Help"
  };
  
  require_once __DIR__ . "/router" . $router .".php";

  $datos = procesarPeticion($uri);