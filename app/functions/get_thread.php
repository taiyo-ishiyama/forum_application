<?php
$thread_array = array();

$sql = "SELECT * FROM thread";
$statement = $pdo->prepare($sql);
$statement->execute();

$thread_array = $statement;

// var_dump($thread_array->fetchObject());