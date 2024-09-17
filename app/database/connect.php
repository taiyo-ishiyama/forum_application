<?php

function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception(".env file not found");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Split the line by the first '=' character
        list($name, $value) = explode('=', $line, 2);

        // Remove whitespace from both sides
        $name = trim($name);
        $value = trim($value);

        // Remove quotes from around the value, if any
        $value = trim($value, '"\'');

        // Set environment variable using putenv or $_ENV
        putenv("$name=$value");
        $_ENV[$name] = $value;
    }
}

loadEnv(__DIR__ . '/../../.env');

$user = getenv("PHPADMIN_USERNAME");
$pass = getenv("PHPADMIN_PASSWORD");

// Connect with DB
try {
  $pdo = new PDO('mysql:host=localhost;dbname=forum_application', $user, $pass);
  // echo "Successfully connected";
} catch (PDOException $error) {
  echo $error->getMessage();
}
