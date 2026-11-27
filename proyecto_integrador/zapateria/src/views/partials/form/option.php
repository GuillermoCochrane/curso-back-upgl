<option 
  value="<?= escapar($id ?? '') ?>"
  <?= (isset($value) && $value == $id) ? 'selected' : '' ?>
  >
  <?= escapar($nombre ?? '') ?>
</option>