<?php
// Create TravelistaDB
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

echo "Connection Successfully! <br>";

$sql = "CREATE DATABASE TravelistaDB";

if ($conn->query($sql)) {
  echo "Create TravelistaDB Successfully! <br>";
} else {
  echo "Create TravelistaDB Failed: " . $conn->error . "<br>";
}
