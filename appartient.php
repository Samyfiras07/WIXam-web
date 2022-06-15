<?php
	 // partie 1 	
	if(isset($_GET['groupe'])&&isset($_GET['etudiant']))
	{ 
		
		foreach($_GET['etudiant'] AS $val){$idetudiant[]= $val;}
		$idgroupe = $_GET['groupe'];
		
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
		
		$stmt = $conn->prepare("INSERT INTO appartient (idetudiant, idgroupe) VALUES (?, $idgroupe)");
		$stmt->bind_param("s", $idetudiant);
    
		
		foreach($idetudiant as $etudiant){
			$idetudiant = $etudiant;
			$stmt->execute();
		}
		$conn->close();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Appartient</title>
	<link rel="stylesheet" href="styles.css">

</head>
<body>
<form name="form1" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<div class="wrapper">
    <div class="title">
      Appartient
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID etudiant</label>
          <div class="custom_select">

              <select name="etudiant[]" size="5" multiple>

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

$sql = "SELECT idetudiant, nom , prenom FROM etudiant where idetudiant not in (select distinct idetudiant from appartient)";
		
$result = mysqli_query($conn,$sql);



if ($result->num_rows > 0) {
  // output data of each row
  $i=1;
  while($row = $result->fetch_assoc()) {
  echo "<option value='" . $row["idetudiant"]. "'> " . $i++." - ".$row["nom"]." ". $row["prenom"] ."</option> " ;

  }

} else {
  echo "<script> alert('table etudiants vide ou tous les étudiants sont affectés')</script>";
}


mysqli_close($conn);

   ?>
           
        
          </select>  
         </div>
         






         
       </div>  
        <div class="inputfield">
          <label>ID Groupe</label>
          <div class="custom_select">

<select name="groupe">

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

$sql = "SELECT IDgroupe, nom FROM groupe ";

$result = mysqli_query($conn,$sql);



if ($result->num_rows > 0) {
  // output data of each row
  $i=1;
  while($row = $result->fetch_assoc()) {
  echo "<option value='" . $row["IDgroupe"]. "'> " . $i++." - ".$row["nom"]. "</option> " ;
  }
} else {
  echo "<script> alert('table salles vide ou toutes les salles sont occupées')</script>";
}
mysqli_close($conn);

?>


</select>  
</div>
       </div>  
      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn">
      </div>
      <div class="inputfield">
        <a href="tableappartient.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>