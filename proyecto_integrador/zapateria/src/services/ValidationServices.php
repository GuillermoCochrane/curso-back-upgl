<?php
  function validarImagen(string $imagen): string {
    if ($imagen !== '' && filter_var($imagen, FILTER_VALIDATE_URL) === false) {
        return 'El link de la imagen debe ser una URL válida (por ejemplo, empezar con https://).';
    }
    return ''; 
  }