<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Registrazione/Login</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'><link rel="stylesheet" href="./style.css">

</head>
<body>
<form action="index.php" method="POST">
<p class="tip"></p>
<!-- partial:index.partial.html -->
<div class="cont">
  <div class="form sign-in">
    <h2>Bentornato,</h2>
    <label>
      <span>Email</span>
      <input type="email" name="emailLog"/>
    </label>
    <label>
      <span>Password</span>
      <input type="password" name="passwordLog"/>
    </label>
    <button type="submit" class="submit" name="accesso">Accedi</button>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>Sei nuovo?</h2>
        <p>Registrati per usufruire dei nostri servizi!</p>
      </div>
      <div class="img__text m--in">
        <h2>Già uno di noi?</h2>
        <p>Se hai già un account, semplicemente accedi. Ci sei mancato!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Registrati</span>
        <span class="m--in">Accedi</span>
      </div>
    </div>
    <div class="form sign-up">
      <h2>Ora di sentirsi come a casa,</h2>
      <label>
        <span>Nome</span>
        <input type="text" name="name"/>
      </label>
      <label>
        <span>Email</span>
        <input type="email" name="emailSign"/>
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="passwordSign" />
      </label>
      <button type="submit" class="submit" name="registrazione" >Registrati</button>
    </div>
  </div>
</div>
</form>

<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
<?php
$user = array("Nome"=>$_POST['name'], "User"=>$_POST['emailSign'], "Password"=>hash("sha256",$_POST['passwordSign']."5id"));
$registerbutton = $_POST['registrazione'];
$loginbutton = $_POST['accesso'];

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

if (isset($registerbutton)) {
  $retrieve = "SELECT * FROM UTENTI WHERE Nome = ?";
  $display=$db->prepare($retrieve);
  $display->execute([$_POST['name']]);
  if($display!=NULL){
    $log = "INSERT INTO Utenti (Nome,Email,Password) VALUES (?,?,?)";
    $db->prepare($log)->execute([$user["Nome"],$user["User"],$user["Password"]]);
    ?><meta http-equiv="refresh" content="0;url=http://www.example.com/"><?php
  } else {
    echo "<script type='text/javascript'>alert(Utente già registrato);</script>";
  }
}
if(isset($loginbutton)){
  $retrieve = "SELECT * FROM UTENTI WHERE Nome = ?";
  $display=$db->prepare($retrieve);
  $display->execute([$_user["Nome"]]);
  if($display==NULL){
    echo "<script type='text/javascript'>alert(Utente non esiste);</script>";
  }else{
    ?><meta http-equiv="refresh" content="0;url=http://www.example.com/"><?php
  }
}
?>