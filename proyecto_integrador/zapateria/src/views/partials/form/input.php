<div class="<?= $col_class ?? 'col-md-6' ?>">
  <label
    class="form-label"
    for="<?= $name ?? "" ?>">
    <?= $label ?? "" ?>
  </label>
  <input
    id="<?= $name ?? "" ?>"
    type="<?= $type ?? 'text' ?>"
    name="<?= $name ?? "" ?>"
    class="form-control <?= (isset($error) && $error) ? 'is-invalid' : '' ?>" 
    placeholder="<?= $placeholder ?? '' ?>"
    value="<?= $value ?? '' ?>"
    <?= isset($required) && $required ? 'required' : '' ?>
    <?= isset($min) ? 'min="' . $min . '"' : '' ?>
    <?= isset($max) ? 'max="' . $max . '"' : '' ?>>

    <span 
      class="invalid-feedback text-warning mt-1"
      id="<?= 'error-' . ($name ?? '') ?>">
      <?= $error ?? "" ?>
    </span>
</div>