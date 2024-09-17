<?php 
include_once("../database/connect.php");
include_once("../../app/functions/add_thread.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create-new-thread page</title>
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
  <?php include("../../app/parts/header.php"); ?>
  <?php include("../parts/validation.php"); ?>

  <div style="padding-left: 36px; color: blue;">
    <h2 style="margin-top: 20px; margin-bottom: 0;">Create a new thread</h2>
  </div>
  <form method="POST" class="formWrapper">
    <div>
      <label>Thread name</label>
      <input type="text" name="title">
      <label>username</label>
      <input type="text" name="username">
    </div>
    <div>
      <textarea name="body" class="commentTextArea"></textarea>
    </div>
    <input type="submit" value="Confirm" name="threadSubmitButton">
  </form>

</body>
</html>