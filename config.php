<?php

$DB_SERVER="localhost";
$DB_USERNAME="root";
$DB_PASSWORD="root";
$DB_NAME="bookstore";

// Create connection
$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>