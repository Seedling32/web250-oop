<?php

require_once('../../../private/initialize.php');
require_login();

if (!isset($_GET['id'])) {
  redirect_to(url_for('/active-record/birds/index.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if ($bird == false) {
  redirect_to(url_for('/active-record/birds/index.php'));
}

if (is_post_request()) {

  // Delete bird
  $result = $bird->delete();
  $session->message('The bird was deleted successfully.');
  redirect_to(url_for('/active-record/birds/index.php'));
} else {
  // Display form
}

?>

<?php $page_title = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/private_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/birds/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle delete">
    <h1>Delete Bird</h1>
    <p>Are you sure you want to delete this bird?</p>
    <p class="item">Common name: <?php echo h($bird->name()); ?></p>
    <p class="item">Habitat: <?php echo h($bird->habitat()); ?></p>
    <p class="item">Food: <?php echo h($bird->display_food()); ?></p>
    <p class="item">Conservation level: <?php echo h($bird->conservation()); ?></p>
    <p class="item">Backyard tips: <?php echo h($bird->tips()); ?></p>

    <form action="<?php echo url_for('/active-record/birds/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Bird" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/private_footer.php'); ?>
