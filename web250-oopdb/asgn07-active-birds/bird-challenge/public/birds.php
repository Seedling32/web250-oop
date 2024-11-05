<?php
require_once('../private/initialize.php');
$page_title = 'Sightings';
include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<!-- Create a table. The header should reflect the headings in the wnc-birds.csv class.
Use a table border of 1 to make the display easier to read. -->

<table id="birds">
  <tr>
    <th>Common name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Conservation level</th>
    <th>Backyard tips</th>
  </tr>

  <?php
  $birds = Bird::find_all();
  foreach ($birds as $bird) {
  ?>

    <!-- Create a table row that lists out all of the bird
    properties. -->

    <tr>
      <td><?php echo h($bird->common_name); ?></td>
      <td><?php echo h($bird->habitat); ?></td>
      <td><?php echo h($bird->food); ?></td>
      <td><?php echo h($bird->conservation_id); ?></td>
      <td><?php echo h($bird->backyard_tips); ?></td>
    </tr>
  <?php } ?>

</table>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
