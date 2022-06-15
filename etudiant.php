

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Etudiant</title>
	<link rel="stylesheet" href="styles.css">
  
  <?php
if(isset($_POST['nom']))
{
$IDetudiant = $_POST['IDetudiant'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$promo = $_POST['promo'];
$NU = $_POST['NU'];
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
$sql = "INSERT INTO etudiant(`IDetudiant`, `nom`, `prenom`, `NU`, `promo`, `email`)
VALUES ('$IDetudiant','$nom', '$prenom', '$NU ','$promo ', '$email')";
try{
 $conn->query($sql) ;
  echo "<script> alert('Enregistrement effectué avec succès');</script>";
} 
catch (Exception){
  echo "<script> alert('Enregistrement non effectué  \nError:". $sql ." \n". $conn->error."')</script>";
}
$conn->close();
}
?>

</head>
<body>
<form action="etudiant.php" method="post">
<div class="wrapper">
    <div class="title">
      Etudiant
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID Etudiant</label>
          <input type="text" class="input" name="IDetudiant">
       </div>  
        <div class="inputfield">
          <label>Nom</label>
          <input type="text" class="input" name="nom">
       </div>  
       <div class="inputfield">
          <label>Prenom</label>
          <input class="input" name="prenom">
       </div>  
      <div class="inputfield">
          <label>Promo</label>
          <input class="input" name="promo">
       </div> 
        <div class="inputfield">
          <label>Niveau Universitaire</label>
          <div class="custom_select" >
            <select name="NU">
              <option value="">Sélectionner</option>
              <option value="L2" >L2</option>
              <option value="L3" >L3</option>
              <option value="M1" >M1</option>
              <option value="M2" >M2</option>
              
            </select>
          </div>
       </div>  
        <div class="inputfield">
          <label>Email</label>
          <input type="text" class="input" name="email">
       </div> 
      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn">
      </div>
      <div class="inputfield">
        <a href="tableetudiant.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>