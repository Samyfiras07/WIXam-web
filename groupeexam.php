<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GroupeExam</title>
	<link rel="stylesheet" href="styles.css">
  <?php
if(isset($_POST['nom']))
{
$IDgroupeExam = $_POST['IDgroupeExam'];
$IDmodule = $_POST['IDmodule'];
$nom = $_POST['nom'];

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

$sql = "INSERT INTO groupeexam(`IDgroupeExam`, `IDmodule`, `nom`)
VALUES ('$IDgroupeExam','$IDmodule', '$nom')";
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
  <form action="groupeexam.php" method="post">
<div class="wrapper">
    <div class="title">
      Groupe Examen
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID Groupe Examen</label>
          <input type="text" class="input" name="IDgroupeExam">
       </div>  
        <div class="inputfield">
          <label>ID module</label>
          <input type="text" class="input" name="IDmodule">
       </div>  
       <div class="inputfield">
          <label>Nom Groupe</label>
          <input class="input" name="nom">
       </div>  
      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn">
      </div>
      <div class="inputfield">
        <a href="tablegroupeexam.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>