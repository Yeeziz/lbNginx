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

$Apache = "alpha";
$log = "INSERT INTO Richieste (Apache) VALUES (?)";
$db->prepare($log)->execute([$Apache]);

echo "Your access as been logged from Alpha.\n";

$retrieve = "SELECT * FROM Richieste WHERE Apache = ?";
$display=$db->prepare($retrieve);
$display->execute([$Apache]);

?>
<!DOCTYPE html>
<html>
<body>
 <h1>Access list</h1>
 <table>
   <thead>
     <tr>
       <th>ID</th>
       <th>Data</th>
       <th>Apache</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $display->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['ID']); ?></td>
       <td><?php echo htmlspecialchars($row['Data']); ?></td>
       <td><?php echo htmlspecialchars($row['Apache']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
  <a href="https://8002-yeeziz-lbnginx-oka6bh7masd.ws-eu32.gitpod.io/">Adminer</a>
</body>
</html>