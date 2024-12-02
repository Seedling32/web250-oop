<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

  // Create record using post parameters
  $args = $_POST['member'];
  $member = new Bird($args);
  $result = $member->save();

  if ($result === true) {
    $new_id = $member->id;
    $_SESSION['message'] = 'The member was created successfully.';
    redirect_to(url_for('/active-record/members/show.php?id=' . $new_id));
  } else {
    // show errors
  }
} else {
  // display the form
  $member = new Member;
}

?>

<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/private_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle new">
    <h1>Create Member</h1>

    <?php //echo display_errors($bird->errors);
    ?>

    <form action="<?php echo url_for('/active-record/members/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Bird">
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/private_footer.php'); ?>
