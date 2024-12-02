<?php require_once('../../private/initialize.php'); ?>

<?php

// Find all bicycles;
$birds = Bird::find_all();

?>
<?php $page_title = 'Birds'; ?>
<?php include(SHARED_PATH . '/private_header.php'); ?>

<div id="content">
  <div class="bicycles listing">
    <h1>Birds</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/active-record/new.php'); ?>">Add Bird</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation ID</th>
        <th>Backyard Tips</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($birds as $bird) { ?>
        <tr>
          <td><?php echo h($bird->id); ?></td>
          <td><?php echo h($bird->common_name); ?></td>
          <td><?php echo h($bird->habitat); ?></td>
          <td><?php echo h($bird->food); ?></td>
          <td><?php echo h($bird->conservation_id); ?></td>
          <td><?php echo h($bird->backyard_tips); ?></td>
          <td><a class="action" href="<?php echo url_for('/active-record/show.php?id=' . h(u($bird->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/active-record/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/active-record/delete.php?id=' . h(u($bird->id))); ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/private_footer.php'); ?>
