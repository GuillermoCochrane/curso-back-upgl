<?php
  require_once __DIR__ . "/../controllers/helpController.php";

  function procesarPeticion(string $uri): array {
    // Para la página de marcas/help, le pasamos la uri al controlador
    return datosHelpController($uri);
  }