<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($member)) {
  redirect_to(url_for('/active-record/members/index.php'));
}
?>

<dl>
  <dt>First Name:</dt>
  <dd><input type="text" name="member[first_name]" value="<?php echo h($member->first_name); ?>" /></dd>
  <?= (!empty($member->errors['first_name'])) ? "<dd style = 'color: red;'>" . $member->errors['first_name'] . "</dd>" : ''; ?>
</dl>

<dl>
  <dt>Last Name:</dt>
  <dd><input type="text" name="member[last_name]" value="<?php echo h($member->last_name); ?>" /></dd>
  <?= (!empty($member->errors['last_name'])) ? "<dd style = 'color: red;'>" . $member->errors['last_name'] . "</dd>" : ''; ?>
</dl>

<dl>
  <dt>User Level:</dt>
  <dd>
    <select name="member[user_level]">
      <option value="">Select One</option>
      <?php foreach (Member::USER_OPTIONS as $option_id => $option_name) : ?>
        <option value="<?= $option_name; ?>"
          <?= ($member->user_level == $option_id) ? 'selected' : ''; ?>>
          <?= $option_name; ?>
        </option>
      <?php endforeach ?>
    </select>
  </dd>
  <?= (!empty($member->errors['user_level'])) ? "<dd style = 'color: red;'>" . $member->errors['user_level'] . "</dd>" : ''; ?>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="text" name="member[email]" value="<?php echo h($member->email); ?>" /></dd>
  <?= (!empty($member->errors['email'])) ? "<dd style = 'color: red;'>" . $member->errors['email'] . "</dd>" : ''; ?>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="member[username]" value="<?php echo h($member->username); ?>" /></dd>
</dl>
