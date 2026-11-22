<?php
  declare(strict_types=1);

  function normalizarTexto(?string $texto): string {
    return trim((string) ($texto ?? ''));
  };

  function normalizarEntero(?string $valor): int {
    $numero = filter_var($valor, FILTER_VALIDATE_INT);
    return $numero !== false ? $numero : 0;
  }