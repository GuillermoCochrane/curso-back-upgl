<?php
  // 1. Definimos la ruta base de tu proyecto en este entorno
  $base_path = '/proyecto_integrador/zapateria';

  // 2. Limpiamos la URL
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Saca los ?action=edit
  $uri = str_replace($base_path, '', $uri); // Quita el prefijo de la subcarpeta
  $uri = rtrim($uri, '/'); // Saca la barra final
  
  // Si queda vacío, es porque entramos a la raíz del proyecto
  if ($uri === '') {
      $uri = '/';
  }

  $actions = [
    "home" => [
      'controller' => '/../controllers/mainController.php',
      'data_function' => 'datosMainController'
    ],
    "help" => [
      'controller' => '/../controllers/helpController.php',
      'data_function' => 'datosHelpController'
    ]
  ];

  $routes = [
    '/' => $actions['home'],
    '/pages' => $actions['home'],
    '/pages/zapatillas' => $actions['help'],
  ];

  // 4. Buscamos la ruta o usamos el default
  $route = $routes[$uri] ?? $routes["/pages/zapatillas"]; // Default a help
  extract($route); 

  // 5. Ejecutamos
  require_once __DIR__ . $controller;
  
  // Usamos match para llamar a la función correcta con sus argumentos correctos
  $datos = match ($data_function) {
      'datosMainController' => datosMainController($zapatillasDB ?? "", $marcasDB ?? ""),
      'datosHelpController' => datosHelpController($uri, $marcasDB ?? ""),
      default               => datosHelpController($uri, $marcasDB ?? ""),
  };

  $datos['base_path'] = $base_path;