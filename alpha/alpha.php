<?php
$servername = "localhost";
$username = "root";
$password = "test";

// Create connection
try {
  $db = new PDO('mysql:host=db;dbname=localhost', 'root', 'test');
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$Data = date("Y-m-d",time());
$Apache = "alpha";
$sql = "INSERT INTO Richieste (Data, Apache) VALUES (?,?)";
$db->prepare($sql)->execute([$Data, $Apache]);

echo "alpha";
?>