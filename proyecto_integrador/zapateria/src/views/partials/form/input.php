<div class="<?= escapar($col_class ?? 'col-md-6') ?>">
  <label
    class="form-label"
    for="<?= escapar($name ?? '') ?>">
    <?= escapar($label ?? '') ?>
  </label>
  <input
    id="<?= escapar($name ?? '') ?>"
    type="<?= escapar($type ?? 'text') ?>"
    name="<?= escapar($name ?? '') ?>"
    class="form-control <?= (isset($error) && $error) ? 'is-invalid' : '' ?>" 
    placeholder="<?= escapar($placeholder ?? '') ?>"
    value="<?= escapar($value ?? '') ?>"
    <?= !empty($required) ? 'required' : '' ?>
    <?= isset($min) ? 'min="' . escapar((string) $min) . '"' : '' ?>
    <?= isset($max) ? 'max="' . escapar((string) $max) . '"' : '' ?>>

    <span 
      class="invalid-feedback text-warning mt-1"
      id="error-<?= escapar($name ?? '') ?>">
      <?= escapar($error ?? '') ?>
    </span>
</div>