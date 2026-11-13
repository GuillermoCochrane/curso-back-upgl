<?php
  /** @var array $marca */
  /** @var array $zapatilla */
  $callback_filtro_zapatillas = function($zapatilla) use ($marca) {
      return $zapatilla['marca_id'] === $marca['id'];
  };
  $zapatillasDeMarca = array_filter($zapatillas ?? [], $callback_filtro_zapatillas);

  foreach ($zapatillasDeMarca as $zapatilla) {
      extract($zapatilla);
      include __DIR__ . "/../../../partials/zapatillas/card_zapatillas.php";
  }
