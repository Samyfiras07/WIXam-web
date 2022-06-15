<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Salle</title>
	<link rel="stylesheet" href="styles.css">

    <?php
if(isset($_POST['num']))
{
$IDsalle = $_POST['IDsalle'];
$num = $_POST['num'];
$local = $_POST['localS'];


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

$sql = "INSERT INTO salle(`IDsalle`, `num`, `localS`)
VALUES ('$IDsalle','$num', '$local')";
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
  <form action="salle.php" method="post">
<div class="wrapper">
    <div class="title">
    Salle
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID salle</label>
          <input type="text" class="input" name="IDsalle">
       </div>  
        <div class="inputfield">
          <label>Num</label>
          <input type="text" class="input" name="num">
       </div>  
       <div class="inputfield">
          <label>Local</label>
          <input class="input" name="localS">
       </div>  
      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn">
      </div>
      <div class="inputfield">
        <a href="tablesalle.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>