<?php

require_once('../../private/initialize.php');

if (is_post_request()) {

  // Create record using post parameters
  $args = $_POST['member'];
  $member = new Member($args);
  $member->user_level = 'M';
  $member->set_hashed_password();
  $result = $member->save();

  if ($result === true) {
    $new_id = $member->id;
    $session->message("You've signed up successfully.");
    $session->login($member);
    redirect_to(url_for('/active-record/birds'));
  } else {
    // show errors
  }
} else {
  // display the form
  $member = new Member;
}

?>

<?php $page_title = 'Sign Up for Membership'; ?>
<?php include(SHARED_PATH . '/private_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle new">
    <h1>Sign Up</h1>

    <?php //echo display_errors($bird->errors);
    ?>

    <form action="<?php echo url_for('/active-record/sign-up.php'); ?>" method="post">

      <?php include('members/form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Sign Up">
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/private_footer.php'); ?>
