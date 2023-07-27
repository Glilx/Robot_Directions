<?php
// Get the value of the button
if (empty($_POST)) {
    $buttonValue = "";
  } else {
    $buttonValue = $_POST["buttonValue"];
  }

// Connect to the database
$db = new PDO("mysql:host=localhost;dbname=directions", "root", "");

// // Save the value in the database

$statement = $db->prepare("INSERT INTO action0 (move) VALUES (:buttonValue)");
$statement->bindParam(":buttonValue", $buttonValue);
$statement->execute();

// // Close the connection
$db = null;
?>
