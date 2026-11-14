<?php
  /** @var array $id */
  /** @var array $zapatilla */
  $callback_filtro_zapatillas = function($zapatilla) use ($id) {
		return $zapatilla['marca_id'] === $id;
  };
  $zapatillasDeMarca = array_filter($zapatillas ?? [], $callback_filtro_zapatillas);

  foreach ($zapatillasDeMarca as $zapatilla) {
		extract($zapatilla);
		include __DIR__ . "/../../../partials/zapatillas/card_zapatillas.php";
  }
