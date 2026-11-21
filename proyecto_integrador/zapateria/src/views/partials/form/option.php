<option 
  value="<?= $id ?? "" ?>"
  <?= (isset($value) && $value == $id) ? 'selected' : '' ?>
  >
  <?= $nombre ?? "" ?>
</option>