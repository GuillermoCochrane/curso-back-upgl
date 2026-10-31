  <header>
    <h1>🍓 Mi lista de frutas</h1>
    <?php if ($mensaje !== ''): ?>
      <p class="mensaje">
        <?= escapar($mensaje) ?>
      </p>
      <!-- Si llega el mensaje, sanitiza el mensaje para que no tenga cosas raras -->
    <?php endif; ?>
  </header>