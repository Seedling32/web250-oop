<?php

require_once('../../../private/initialize.php');

require_login();

if (!isset($_GET['id'])) {
  redirect_to(url_for('/active-record/members/index.php'));
}
$id = $_GET['id'];
$member = Member::find_by_id($id);
if ($member == false) {
  redirect_to(url_for('/active-record/members/index.php'));
}

if (is_post_request()) {

  // Delete bird
  $result = $member->delete();
  $session->message('The member was deleted successfully.');
  redirect_to(url_for('/active-record/members/index.php'));
} else {
  // Display form
}

?>

<?php $page_title = 'Delete Member'; ?>
<?php include(SHARED_PATH . '/private_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle delete">
    <h1>Delete Member</h1>
    <p>Are you sure you want to delete this member?</p>
    <p class="item">Name: <?php echo h($member->full_name()); ?></p>
    <p class="item">Email: <?php echo h($member->email()); ?></p>
    <p class="item">User Level: <?php echo h($member->type()); ?></p>
    <p class="item">Username: <?php echo h($member->username()); ?></p>

    <form action="<?php echo url_for('/active-record/members/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Member" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/private_footer.php'); ?>
