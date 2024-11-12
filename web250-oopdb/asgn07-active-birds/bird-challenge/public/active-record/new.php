<?php

require_once('../../private/initialize.php');

if (is_post_request()) {

  // Create record using post parameters
  $args = [];
  $args['common_name'] = $_POST['common_name'] ?? NULL;
  $args['habitat'] = $_POST['habitat'] ?? NULL;
  $args['food'] = $_POST['food'] ?? NULL;
  $args['conservation_id'] = $_POST['conservation_id'] ?? NULL;
  $args['backyard_tips'] = $_POST['backyard_tips'] ?? NULL;

  $bird = new Bird($args);
  $result = $bird->save();

  if ($result === true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'The bird was created successfully.';
    redirect_to(url_for('/active-record/show.php?id=' . $new_id));
  } else {
    // show errors
  }
} else {
  // display the form
  $bird = new Bird;
}

?>

<?php $page_title = 'Create Bird'; ?>
<?php include(SHARED_PATH . '/private_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle new">
    <h1>Create Bird</h1>

    <?php // echo display_errors($errors); 
    ?>

    <form action="<?php echo url_for('/active-record/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Bird">
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/private_footer.php'); ?>
