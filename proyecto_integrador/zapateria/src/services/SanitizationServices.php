<?php
  declare(strict_types=1);

  function escapar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
  }

  function normalizarTexto(?string $texto): string {
    return trim((string) ($texto ?? ''));
  };

  function normalizarEntero(?string $valor): int {
    $numero = filter_var($valor, FILTER_VALIDATE_INT);
    return $numero !== false ? $numero : 0;
  }

  function normalizarDecimal(?string $valor): float {
    $valorLimpio = str_replace(',', '.', $valor);
    $numero = filter_var($valorLimpio, FILTER_VALIDATE_FLOAT);
    return $numero !== false ? $numero : 0.0;
  }

  function normalizarArray(?string $valor): array {
    $elementos = explode(',', $valor);
    $elementosLimpios = array_map('trim', $elementos);
    return array_values(array_filter($elementosLimpios, function($item) {
        return $item !== '';
    }));
  }

  function sanitaizarURI():string{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = str_replace(BASE_PATH, '', $uri);
    $uri = rtrim($uri, '/');
    return $uri;
  }

  function sanitizarZapatilla(array $datos): array {
    return [
      "nombre"      => normalizarTexto($datos["nombre"] ?? ""),
      "marcaID"     => normalizarEntero($datos["marcaID"] ?? ""),
      "precio"      => normalizarEntero($datos["precio"] ?? ""),
      "stock"       => normalizarEntero($datos["stock"] ?? ""),
      "descripcion" => normalizarTexto($datos["descripcion"] ?? ""),
      "talles"      => normalizarEntero($datos["talles"] ?? ""),
      "colores"     => normalizarTexto($datos["colores"] ?? ""),
      "imagen"      => normalizarTexto($datos["imagen"] ?? "")
    ];
  }