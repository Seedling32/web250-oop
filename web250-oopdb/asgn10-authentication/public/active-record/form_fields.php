<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($bird)) {
  redirect_to(url_for('/active-record/index.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" /></dd>
  <?= (!empty($bird->errors['common_name'])) ? "<dd style = 'color: red;'>" . $bird->errors['common_name'] . "</dd>" : ''; ?>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" /></dd>
  <?= (!empty($bird->errors['habitat'])) ? "<dd style = 'color: red;'>" . $bird->errors['habitat'] . "</dd>" : ''; ?>
</dl>

<dl>
  <dt>Food</dt>
  <dd>
    <select name="bird[food]">
      <option value="">Select One</option>
      <?php foreach (Bird::FOOD_OPTIONS as $option_id => $option_name) : ?>
        <option value="<?= $option_name; ?>"
          <?= ($bird->food == $option_name) ? 'selected' : ''; ?>>
          <?= $option_name; ?>
        </option>
      <?php endforeach ?>
    </select>
  </dd>
  <?= (!empty($bird->errors['food'])) ? "<dd style = 'color: red;'>" . $bird->errors['food'] . "</dd>" : ''; ?>
</dl>

<dl>
  <dt>Conservation ID</dt>
  <dd>
    <select name="bird[conservation_id]">
      <?php foreach (Bird::CONSERVATION_OPTIONS as $cond_id => $cond_name) : ?>
        <option value="<?= $cond_id; ?>"
          <?= ($bird->conservation_id == $cond_id) ? 'selected' : ''; ?>>
          <?= $cond_name; ?>
        </option>
      <?php endforeach ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><textarea name="bird[backyard_tips]" rows="5" cols="50"><?php echo h($bird->backyard_tips); ?></textarea></dd>
</dl>
