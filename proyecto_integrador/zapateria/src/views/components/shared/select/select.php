<div class="<?= escapar($col_class ?? 'col-md-6') ?>">
  <label
    class="form-label"
    for="<?= escapar($name ?? '') ?>">
    <?= escapar($label ?? '') ?>
  </label>
  <select
    id="<?= escapar($name ?? '') ?>"
    name="<?= escapar($name ?? '') ?>"
    class="form-select <?= (isset($error) && $error) ? 'is-invalid' : '' ?>"
    <?= !empty($required) ? 'required' : '' ?>
  >
    <option value="">Seleccione <?= escapar($default_option ?? 'una opcion') ?>...</option>
    <?php 
      if (!empty($handler)) {
        require_once __DIR__ . $handler;
      }
      /** @disregard P1010 Undefined function */
      render_options($options ?? [], $value ?? null);
    ?>
  </select>
  <span
    class="invalid-feedback text-warning mt-1"
    id="error-<?= escapar($name ?? '') ?>">
    <?= escapar($error ?? '') ?>
  </span>
</div>