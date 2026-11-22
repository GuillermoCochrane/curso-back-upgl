<?php
  declare(strict_types=1);

  function normalizarTexto(?string $texto): string {
    return trim((string) ($texto ?? ''));
  }