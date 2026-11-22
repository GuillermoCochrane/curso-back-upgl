<?php
  declare(strict_types=1);

  function normalizarTexto(?string $texto): string {
    return trim((string) ($texto ?? ''));
  };

  function normalizarEntero(?string $valor): int {
    $numero = filter_var($valor, FILTER_VALIDATE_INT);
    return $numero !== false ? $numero : 0;
  }

  function normalizarDecimal(?string $valor): float {
    if ($valor === null) return 0.0;
    $valorLimpio = str_replace(',', '.', $valor);
    $numero = filter_var($valorLimpio, FILTER_VALIDATE_FLOAT);
    return $numero !== false ? $numero : 0.0;
  }