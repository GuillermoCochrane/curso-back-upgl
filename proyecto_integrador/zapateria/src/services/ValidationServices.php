<?php
  function validarImagen(string $imagen): string {
    if ($imagen !== '' && filter_var($imagen, FILTER_VALIDATE_URL) === false) {
        return 'El link de la imagen debe ser una URL válida (por ejemplo, empezar con https://).';
    }
    return ''; 
  }

  function validarCamposRequeridos(array $campos): string {
    foreach ($campos as $campo => $valor) {
      if (trim($valor) === '') {
        return "Debe completar el campo $campo.";
      }
    }
    return '';
  }