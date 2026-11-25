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

  function validarCreacionZapatillas(array $datos): string {
    // 1. Armamos los campos requeridos (usando el array que nos pasan)
    $campos_requeridos = [
      "nombre"    => $datos['nombre'] ?? '',
      "marca_id"   => $datos['marca_id'] ?? '',
      "precio"    => $datos['precio'] ?? '',
      "stock"     => $datos['stock'] ?? ''
    ];

    // 2. Validamos los obligatorios y guardamos el resultado
    $mensaje = validarCamposRequeridos($campos_requeridos);

    // 3. Si no hubo error en los obligatorios, validamos la imagen
    if ($mensaje === '') {
        $mensaje = validarImagen($datos['imagen'] ?? '');
    }

    return $mensaje;
  }