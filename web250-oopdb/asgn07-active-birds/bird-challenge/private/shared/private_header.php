<?php
if (!isset($page_title)) {
  $page_title = 'Private Area';
}
?>

<!doctype html>

<html lang="en">

<head>
  <title><?php echo h($page_title); ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
</head>

<body>
  <header>
    <h1>WNC Birds Private Area</h1>
  </header>

  <navigation>
    <ul>
      <li><a href="<?php echo url_for('/active-record/index.php'); ?>">Menu</a></li>
    </ul>
  </navigation>

  <?php echo display_session_message(); ?>
