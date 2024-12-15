<?php
require_once('../../private/initialize.php');
$page_title = "Member Menu";
include(SHARED_PATH . '/private_header.php');
require_login();
?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/active-record/birds'); ?>">Manage Birds</a></li>
      <?php if ($session->get_user_level() === "A") { ?>
        <li><a href="<?php echo url_for('/active-record/members'); ?>">Manage Members</a></li>
      <?php } ?>
    </ul>

    <?php include(SHARED_PATH . '/private_footer.php'); ?>
