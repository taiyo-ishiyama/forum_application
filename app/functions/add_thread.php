<?php
$error_message = array();
if(isset($_POST["threadSubmitButton"]))
{
  // input validation for thread name
  if (empty($_POST["title"])) {
    $error_message["title"] = "Please enter the thread title";
  } else {
    // escaping for xss
    $escaped["title"] = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
  }

  // input validation for name
  if (empty($_POST["username"])) {
    $error_message["username"] = "Please enter your name";
  } else {
    // escaping for xss
    $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
  }

  // input validation for body
  if (empty($_POST["body"])) {
    $error_message["body"] = "Please enter your comment";
  } else {
    // escaping for xss
    $escaped["body"] = htmlspecialchars($_POST["body"], ENT_QUOTES, "UTF-8");
  }

  if (empty($error_message)) {
    $post_date = date("Y-m-d H:i:s");

    $pdo->beginTransaction();
    try {
      $sql = "INSERT INTO `thread` (`title`) VALUES (:title);";
      $statement = $pdo->prepare($sql);
  
      // set values
      $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR);
  
      $statement->execute();
  
      // add comment
      $sql = "INSERT INTO comment (username, body, post_date, thread_id) 
          VALUES (:username, :body, :post_date, (SELECT id FROM thread WHERE title = :title))";
              $statement = $pdo->prepare($sql);
  
      $statement = $pdo->prepare($sql);
  
      $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR);
      $statement->bindParam(":body", $escaped["body"], PDO::PARAM_STR);
      $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
      $statement->bindParam(":title", $escaped["title"], PDO::PARAM_STR);
  
      $statement->execute();

      $pdo->commit();

    } catch (Exception $error) {
      $pdo->rollBack();
    }


  }

  header("Location: http://localhost:8080/forum_application");
}