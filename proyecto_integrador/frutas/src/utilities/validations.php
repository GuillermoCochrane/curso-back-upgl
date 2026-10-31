<?php
  declare(strict_types=1);// Setea tipado fuerte para todo el archivo

    // Sanitizador de Datos
  function escapar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
  }

    function sanitizarEntrada(?string $entrada): string {
      $entrada = (string) ($entrada ?? '');
      $entrada = strip_tags($entrada); 
      $entrada = trim($entrada);
      return $entrada;
  }

  function sanitizarPost(string $key): string {
      return sanitizarEntrada($_POST[$key] ?? null);
  }

  function sanitizarGet(string $key): string {
      return sanitizarEntrada($_GET[$key] ?? null);
  }

  function validarImagen(string $imagen): string {
      if ($imagen !== '' && filter_var($imagen, FILTER_VALIDATE_URL) === false) {
          return 'El link de la imagen debe ser una URL válida (por ejemplo, empezar con https://).';
      }
      return ''; 
  }

?>