<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Absence</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Absence
    </div>
    <div class="form">



       <div class="inputfield">
          <label>ID etudiant</label>
          <select name="appartient" multiple>

<?php

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

$sql = "SELECT IDetudiant, nom, prenom FROM etudiant";

$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($result))
{
 echo '<option value="'. $row['IDetudiant'] .'">'. $row['nom'] .''. $row['prenom'] .'</option>';
}

mysqli_close($conn);

   ?>
           
        
          </select> 
       </div>  



        <div class="inputfield">
          <label>ID Groupe</label>
          <select name="appartient">

<?php

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

$sql = "SELECT IDgroupe, nom FROM groupe";

$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['IDgroupe'] .'">'. $row['nom'] .'</option>';
}

mysqli_close($conn);

?>


</select> 
       </div>  



       <div class="inputfield">
          <label>Date</label>
          <input type="datetime-local" class="input">
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
	
</body>
</html>