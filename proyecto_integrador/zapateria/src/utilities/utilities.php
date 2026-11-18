<?php
  declare(strict_types=1);// Setea tipado fuerte para todo el archivo

  function recuperarID(string $key, bool $isPost): int {
    $origen = $isPost ? $_POST : $_GET;
    return (int) ($origen[$key] ?? 0);
  }

  function generarID(array $datos): int {
    $ids = array_column($datos, 'id'); 
    $nuevoId = $ids === [] ? 1 : max($ids) + 1;
    return $nuevoId;
  }
  function generarSlug(string $nombre): string {
    //Reemplaza caracteres especiales por guiones
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $nombre);
    //Saca guiones de los extremos y pasa a minúsculas
    return strtolower(trim($slug, '-'));
  }