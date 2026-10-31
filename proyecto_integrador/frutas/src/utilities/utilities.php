<?php
  declare(strict_types=1);// Setea tipado fuerte para todo el archivo

  function recuperarPostID(): int {
    return (int) ($_POST['id'] ?? 0);
  }

  function recuperarGetID(): int {
    return (int) ($_GET['editar'] ?? 0);
  }

  // Funciones de Renderizado de Card de fruta
  function renderizarCardFruta(array $fruta): void {
    include __DIR__ . '/../views/partials/card-fruta.php';
  }
?>