<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Groupe</title>
	<link rel="stylesheet" href="styles.css">
    <?php
if(isset($_POST['nom']))
{
$IDgroupe = $_POST['IDgroupe'];
$nom = $_POST['nom'];
$tdtp = $_POST['tdtp'];

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
$sql = "INSERT INTO groupe(`IDgroupe`, `nom`, `tdtp`)
VALUES ('$IDgroupe', '$nom', '$tdtp')";
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
  <form action="groupe.php" method="post">
<div class="wrapper">
    <div class="title">
      Groupe
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID Groupe</label>
          <input type="text" class="input" name="IDgroupe">
       </div>  
          
       <div class="inputfield">
          <label>Nom Groupe</label>
          <input class="input" name="nom">
       </div>  
        <div class="inputfield">
          <label>TD/TP</label>
          <div class="custom_select">
            <select name="tdtp">
              <option value="">Sélectionner</option>
              <option value="td">TD</option>
              <option value="tp">TP</option>
            </select>
          </div>
       </div> 
      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn">
      </div>
      <div class="inputfield">
        <a href="tablegroupe.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>