<?php
// Create Users Table
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TravelistaDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

echo "Connection Successfully <br>";

$sql = "CREATE TABLE Users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,  
  email VARCHAR(50) NOT NULL UNIQUE,
  pass VARCHAR(50) NOT NULL
)";

if ($conn->query($sql)) {
  echo "Cerate Users Table Successfully!";
} else {
  echo "Cerate Users Table Failed: " . $conn->error;
}
