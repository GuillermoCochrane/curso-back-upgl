  <header>
    <h1>🍓 Mi lista de frutas</h1>
    <p class="ayuda">Un ejemplo de altas, búsquedas, modificaciones y bajas (CRUD) con PHP, arrays y un archivo JSON.</p>
    <?php if ($mensaje !== ''): ?>
      <p class="mensaje">
        <?= escapar($mensaje) ?>
      </p>
      <!-- Si llega el mensaje, sanitiza el mensaje para que no tenga cosas raras -->
    <?php endif; ?>
  </header>