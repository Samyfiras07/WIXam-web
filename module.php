<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>module</title>
	<link rel="stylesheet" href="styles.css">
    <?php
if(isset($_POST['nom']))
{
$IDmodule = $_POST['IDmodule'];
$nom = $_POST['nom'];
$nu = $_POST['nu'];
$semestre = $_POST['semestre'];

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

$sql = "INSERT INTO module(`IDmodule`, `nom`, `nu`, `semestre`)
VALUES ('$IDmodule','$nom', '$nu','$semestre')";
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
  <form action="module.php" method="post">
<div class="wrapper">
    <div class="title">
      MODULE
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID module</label>
          <input type="text" class="input" name="IDmodule">
       </div>  
        <div class="inputfield">
          <label>Nom module</label>
          <input type="text" class="input" name="nom">
       </div>  
        <div class="inputfield">
          <label>Niveau Universitaire</label>
          <div class="custom_select">
            <select name="nu">
              <option value="">Sélectionner</option>
              <option value="L2">L2</option>
              <option value="L3">L3</option>
              <option value="M1">M1</option>
              <option value="M2">M2</option>
            </select>
          </div>
       </div> 
        <div class="inputfield">
          <label>Semestre</label>
          <input type="text" class="input" name="semestre">
       </div> 
      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn">
      </div>
      <div class="inputfield">
        <a href="tablemodule.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>