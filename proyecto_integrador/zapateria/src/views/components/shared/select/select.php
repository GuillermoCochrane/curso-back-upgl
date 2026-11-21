<div class="<?= $col_class ?? 'col-md-6' ?>">
  <label
    class="form-label"
    for="<?= $name ?? "" ?>">
    <?= $label ?? "" ?>
  </label>
  <select
    id="<?= $name ?? "" ?>"
    name="<?= $name ?? "" ?>"
    class="form-select <?= (isset($error) && $error) ? 'is-invalid' : '' ?>"
    <?= isset($required) && $required ? 'required' : '' ?>
  >
    <option value="">Seleccione <?= $default_option ?? "una opcion" ?>...</option>
    <?php 
      require_once __DIR__ . ($handler ?? "");
      /** @disregard P1010 Undefined function */
      render_options($options ?? [], $value ?? null);
    ?>
  </select>
  <span
    class="invalid-feedback text-warning mt-1"
    id="<?= 'error-' . ($name ?? '') ?>">
    <?= $error ?? "" ?>
  </span>
</div>