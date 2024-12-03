<?php
require_once('../../../private/initialize.php');
require_login();

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$member = Member::find_by_id($id);

?>

<?php $page_title = 'Show Member: ' . h($member->full_name()); ?>
<?php include(SHARED_PATH . '/private_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/members/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle show">

    <h1>Member: <?php echo h($member->full_name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First Name:</dt>
        <dd><?php echo h($member->first_name); ?></dd>
      </dl>
      <dl>
        <dt>Last Name:</dt>
        <dd><?php echo h($member->last_name); ?></dd>
      </dl>
      <dl>
        <dt>Email:</dt>
        <dd><?php echo h($member->email); ?></dd>
      </dl>
      <dl>
        <dt>Username:</dt>
        <dd><?php echo h($member->username); ?></dd>
      </dl>
    </div>

  </div>

</div>
