<div class="<?= $col_class ?? 'col-12' ?>">
  <label
    class="form-label"
    for="<?= $name ?? "" ?>">
    <?= $label ?? "" ?>
  </label>
  <textarea
    id="<?= $name ?? "" ?>"
    name="<?= $name ?? "" ?>"
    class="form-control <?= (isset($error) && $error) ? 'is-invalid' : '' ?>"
    placeholder="<?= $placeholder ?? '' ?>"
    <?= isset($required) && $required ? 'required' : '' ?>
    <?= isset($rows) ? 'rows="' . $rows . '"' : 'rows="3"' ?>
    <?= isset($cols) ? 'cols="' . $cols . '"' : '' ?>><?= $value ?? '' ?></textarea>
  <span
    class="invalid-feedback text-warning mt-1"
    id="<?= 'error-' . ($name ?? '') ?>">
    <?= $error ?? "" ?>
  </span>
</div>