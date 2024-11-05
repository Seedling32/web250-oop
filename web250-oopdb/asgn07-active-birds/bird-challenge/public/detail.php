<?php
require_once('../private/initialize.php');

$common_name = $_GET['common_name'] ?? false;
if (!$common_name) {
  redirect_to('birds.php');
}

$bird = Bird::find_by_name($common_name);
$page_title = $bird->name();
include(SHARED_PATH . '/public_header.php');
?>

<div id="main">
  <a href="birds.php">Back to all birds</a>
  <div id="page">
    <div id="detail">
      <dl>
        <dt>Common Name</dt>
        <dd><?php echo h($bird->common_name); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($bird->habitat); ?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?php echo h($bird->food); ?></dd>
      </dl>
      <dl>
        <dt>Conservation ID</dt>
        <dd><?php echo h($bird->conservation_id); ?></dd>
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?php echo h($bird->backyard_tips); ?></dd>
      </dl>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
