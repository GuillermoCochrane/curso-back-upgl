<?php
  declare(strict_types=1);

  function validarImagen(string $imagen): string {
    if ($imagen !== '' && filter_var($imagen, FILTER_VALIDATE_URL) === false) {
        return 'El link de la imagen debe ser una URL válida (por ejemplo, empezar con https://).';
    }
    return ''; 
  }

  function validarRequerido(string $nombreCampo, string $valor): string {
    if (trim($valor) === '') {
      return "Debe completar el campo $nombreCampo.";
    }
    return '';
  }

  function validarNumero(string $nombreCampo, string $valor): string {
    if (filter_var($valor, FILTER_VALIDATE_FLOAT) === false) {
      return "El campo $nombreCampo debe ser un número válido.";
    }
    return '';
  }

  function validarPositivo(string $nombreCampo, string $valor): string {
    if ((float)$valor < 0) {
      return "El campo $nombreCampo no puede ser un número negativo.";
    }
    return '';
  }

  function validar(array $campos, string $validacion): string {
    foreach ($campos as $campo => $valor) {
      $error = match($validacion) {
        "requerido" => validarRequerido($campo, $valor),
        "numero"    => validarNumero($campo, $valor),
        "positivo"  => validarPositivo($campo, $valor),
        default     => ''
      };
      
      if ($error !== '') {
          return $error;
      }
    }
    return '';
  }

  function validarCreacionZapatillas(array $datos): string {

  $campos_requeridos = [
      "nombre"    => $datos['nombre'] ?? '',
      "marca_id"  => $datos['marca_id'] ?? '',
      "precio"    => $datos['precio'] ?? '',
      "stock"     => $datos['stock'] ?? ''
    ];

    $mensaje = validarCamposRequeridos($campos_requeridos);

    if ($mensaje === '') {
      $mensaje = validarImagen($datos['imagen'] ?? '');
    }

    if ($mensaje === '') {
      $mensaje = validarNumero('precio', $datos['precio'] ?? '');
    }
    if ($mensaje === '') {
      $mensaje = validarPositivo('precio', $datos['precio'] ?? '');
    }
    
    if ($mensaje === '') {
      $mensaje = validarNumero('stock', $datos['stock'] ?? '');
    }
    if ($mensaje === '') {
      $mensaje = validarPositivo('stock', $datos['stock'] ?? '');
    }

    return $mensaje;
  }