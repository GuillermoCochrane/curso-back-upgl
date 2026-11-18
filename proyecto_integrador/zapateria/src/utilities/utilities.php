<?php
  declare(strict_types=1);// Setea tipado fuerte para todo el archivo

  function recuperarID(string $key, bool $isPost): int {
    $origen = $isPost ? $_POST : $_GET;
    return (int) ($origen[$key] ?? 0);
  }