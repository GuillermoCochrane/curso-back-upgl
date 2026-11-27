<div class="<?= $col_class ?? 'col-12' ?>">
  <label
    class="form-label"
    for="<?= escapar($name ?? '') ?>">
    <?= escapar($label ?? '') ?>
  </label>
  <textarea
    id="<?= escapar($name ?? '') ?>"
    name="<?= escapar($name ?? '') ?>"
    class="form-control <?= (isset($error) && $error) ? 'is-invalid' : '' ?>"
    placeholder="<?= escapar($placeholder ?? '') ?>"
    <?= isset($required) && $required ? 'required' : '' ?>
    <?= isset($rows) ? 'rows="' . escapar($rows) . '"' : 'rows="3"' ?>
    <?= isset($cols) ? 'cols="' . escapar($cols) . '"' : '' ?>><?= escapar($value ?? '') ?></textarea>
  <span
    class="invalid-feedback text-warning mt-1"
    id="error-<?= escapar($name ?? '') ?>">
    <?= escapar($error ?? '') ?>
  </span>
</div>