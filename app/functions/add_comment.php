<?php
$error_message = array();

session_start();

if(isset($_POST["submitButton"]))
{
  // input validation for name
  if (empty($_POST["username"])) {
    $error_message["username"] = "Please enter your name";
  } else {
    // escaping for xss
    $escaped["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    $_SESSION["username"] = $escaped["username"];
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
    $sql = "INSERT INTO `comment` (`username`, `body`, `post_date`, `thread_id`) VALUES (:username, :body, :post_date, :thread_id);";
    $statement = $pdo->prepare($sql);

    // set values
    $statement->bindParam(":username", $escaped["username"], PDO::PARAM_STR);
    $statement->bindParam(":body", $escaped["body"], PDO::PARAM_STR);
    $statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);
    $statement->bindParam(":thread_id", $_POST["threadID"], PDO::PARAM_STR);

    $statement->execute();

    $pdo->commit();
    } catch (Exception $error) {
        $pdo->rollBack();
    }
  }
}