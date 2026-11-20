<?php
  require_once __DIR__ . "/../controllers/mainController.php";

  function procesarPeticion(string $uri): array {
    return datosMainController();
  }