<?php include_once("./app/database/connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Bulletine Board</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <?php include("app/parts/header.php"); ?>

  <?php include("app/parts/validation.php"); ?>
  <?php include("app/parts/thread.php"); ?>
  <?php include("app/parts/newThreadButton.php"); ?>

</body>
</html>