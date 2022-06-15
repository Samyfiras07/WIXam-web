<?php
	 // partie 1 	
	if(isset($_GET['groupeexam'])&&isset($_GET['etudiant']))
	{ 
		
		foreach($_GET['etudiant'] AS $val){$idetudiant[]= $val;}
		$idgroupeexam = $_GET['groupeexam'];
		
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
		
		$stmt = $conn->prepare("INSERT INTO passe (idetudiant, idgroupeexam) VALUES (?, $idgroupeexam)");
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
	<title>Passe</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<form name="form1" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="wrapper">
    <div class="title">
      Passe
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID Etudiant</label>
          
          <select name="etudiant[]" multiple size="10">

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

$sql = "SELECT idetudiant, nom , prenom FROM etudiant where idetudiant not in (select distinct idetudiant from passe)";
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






        <div class="inputfield">
          <label>ID Groupe Examen</label>
          <select name="groupeexam">

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


$sql = "SELECT IDgroupeexam, nom FROM groupeexam";

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i=1;
  while($row = $result->fetch_assoc()) {
  echo "<option value='" . $row["IDgroupeexam"]. "'> " . $i++." - ".$row["nom"]. "</option> " ;
  }
} else {
  echo "<script> alert('table salles vide ou toutes les salles sont occupées')</script>";
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
        <a href="tablepasse.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>