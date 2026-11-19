<?php
  //? 1. Limpiamos la URL
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Saca los ?action=edit
  $uri = str_replace(BASE_PATH, '', $uri); // Quita el prefijo de la subcarpeta
  $uri = rtrim($uri, '/'); // Saca la barra final
  
  //! Si queda vacío, es porque entramos a la raíz del proyecto
  if ($uri === '') {
      $uri = '/';
  }

  // NUEVO: Capturamos el ID que viene por la URL (?id=nike-dunk-low)
  $id = $_GET['id'] ?? '';

  //? 2. Definimos las rutas, sus controladores y funciones
  $actions = [
    "home" => [
      'controller' => '/../controllers/mainController.php',
      'data_function' => 'datosMainController'
    ],
    "help" => [
      'controller' => '/../controllers/helpController.php',
      'data_function' => 'datosHelpController'
    ],
    "zapatillas" => [
      'controller' => '/../controllers/zapatillasController.php',
      'data_function' => 'datosZapatillas'
    ],
    "zapatilla" => [
      'controller' => '/../controllers/zapatillasController.php',
      'data_function' => 'datosZapatilla'
    ],
    "crear" => [
      'controller' => '/../controllers/zapatillasController.php',
      'data_function' => 'datosCrearZapatilla'
    ]
  ];

  $routes = [
    '/' => $actions['home'],
    '/pages' => $actions['home'],
    '/pages/zapatillas' => $actions['zapatillas'],
    '/pages/marcas' => $actions['help'],
    '/pages/zapatillas/detalle' => $actions['zapatilla'], 
    '/pages/zapatillas/crear' => $actions['crear'],
  ];

  //? 3. Buscamos la ruta o usamos el default
  $route = $routes[$uri] ?? $routes["/pages/marcas"];
  extract($route); 

  require_once __DIR__ . $controller;
  
  //? 4. Usamos match para llamar a la función correcta con sus argumentos correctos
  $datos = match ($data_function) {
      'datosMainController' => datosMainController(),
      'datosHelpController' => datosHelpController($uri),
      'datosZapatillas'     => datosZapatillas(),
      'datosZapatilla'      => datosZapatilla($id),
      'datosCrearZapatilla' => datosCrearZapatilla(),
      default               => datosHelpController($uri),
  };