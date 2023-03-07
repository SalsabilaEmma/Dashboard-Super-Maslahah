<?php
$servername   = "192.168.31.115:39155";
$database = "dash_supermaslahah";
$username = "49155";
$password = "49155-M@rsDB**70";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";
?>