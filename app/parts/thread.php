<?php

include_once("./app/database/connect.php");

include("app/functions/add_comment.php");

include("app/functions/get_thread.php");
include("app/parts/validation.php");
?>

<?php foreach ($thread_array as $thread): ?>
<div class="threadWrapper">
    <div class="childWrapper">
      <div class="threadTitle">
        <span>[Title]</span>
        <h1><?php echo $thread["title"] ?></h1>
      </div>
      <?php include("commentSection.php"); ?>
      <?php include("commentForm.php"); ?>
    </div>
  </div>
  <?php endforeach ?>