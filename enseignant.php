<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Enseignant</title>
	<link rel="stylesheet" href="styles.css">
    <?php
if(isset($_POST['nom']))
{
$IDenseignant = $_POST['IDenseignant'];
$pseudo = $_POST['pseudo'];
$motdepasse = $_POST['motdepasse'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nfc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO enseignant(`IDenseignant`, `pseudo`, `motdepasse`, `nom`, `prenom`, `email`)
VALUES ('$IDenseignant','$pseudo', '$motdepasse', '$nom ','$prenom ', '$email')";
try{
 $conn->query($sql) ;
  echo "<script> alert('Enregistrement effectué avec succès');</script>";
} catch (Exception){
  echo "<script> alert('Enregistrement non effectué  \nError:". $sql ." \n". $conn->error."')</script>";
}
$conn->close();
}
?>
</head>
<body>
   <form action="enseignant.php" method="post">
<div class="wrapper">
    <div class="title">
      Enseignant
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID Enseignant</label>
          <input type="text" class="input" name="IDenseignant">
       </div>  
        <div class="inputfield">
          <label>pseudo</label>
          <input type="text" class="input" name="pseudo">
       </div>  
       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="motdepasse">
       </div>  
      <div class="inputfield">
          <label>Nom</label>
          <input class="input" name="nom">
       </div> 
       <div class="inputfield">
        <label>Prenom</label>
        <input  class="input" name="prenom">
     </div> 
        <div class="inputfield">
          <label>Email </label>
          <input type="text" class="input" name="email">
       </div> 
      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn">
      </div>
      <div class="inputfield">
        <a href="tableenseignant.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>