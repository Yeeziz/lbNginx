<?php
session_start();

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

$retrieve = "SELECT * FROM UTENTI WHERE Email = ?";
$display=$db->prepare($retrieve);
$display->execute([$_SESSION["email"]]);
$data = $display->fetch(PDO::FETCH_ASSOC);
echo "Hello ".$data["Nome"];
echo "Your email is ".$data["Email"];
?>