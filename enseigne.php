<?php
	 // partie 1 	
	if(isset($_GET['groupe'])&&isset($_GET['enseignant'])&&isset($_GET['salle'])&&isset($_GET['module']))
	{ 
		
		foreach($_GET['enseignant'] AS $val){$idenseignant[]= $val;}
		$idgroupe = $_GET['groupe'];
    $idsalle = $_GET['salle'];
		$idmodule = $_GET['module'];

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
		
		$stmt = $conn->prepare("INSERT INTO enseigne (idenseignant, idgroupe, idsalle, idmodule) VALUES (?, $idgroupe,$idsalle,$idmodule)");
		$stmt->bind_param("i", $idenseignant);
		
		foreach($idenseignant as $enseignant){
			$idenseignant = $enseignant;
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
	<title>Enseigne</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<form name="form1" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="wrapper">
    <div class="title">
      Enseigne
    </div>
    <div class="form">
       <div class="inputfield">
          <label>ID enseignant</label>
          <select name="enseignant[]" multiple >

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


$sql = "SELECT IDenseignant, nom, prenom FROM enseignant ";

$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i=1;
  while($row = $result->fetch_assoc()) {
  echo "<option value='" . $row["IDenseignant"]. "'> " . $i++." - ".$row["nom"]." ". $row["prenom"] ."</option> " ;
  }
} else {
  echo "<script> alert('table enseignant vide ou tous les enseignants sont affectés')</script>";
}

mysqli_close($conn);

   ?>          
   </select>  
       </div>  
       
       
       <div class="inputfield">
          <label>ID Groupe</label>
          <select name="groupe" multiple>
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
  echo "<script> alert('table groupe vide ou tous les groupe sont occupées')</script>";
}
mysqli_close($conn);

?>
</select>  
       </div>  
        
  
       <div class="inputfield">
          <label>ID Salle</label>
          <select name="salle" >

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

$sql = "SELECT IDsalle, num, localS FROM salle ";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo '<option value="'. $row['IDsalle'] .'">'. $row['num'] .''. $row['localS'] .'</option>';
  }
} else {
  echo "<script> alert('table salles vide ou toutes les salles sont occupées')</script>";
}
mysqli_close($conn);
   ?>
          </select>  
       </div>  


       <div class="inputfield">
          <label>ID module</label>
          <select name="module" >

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

$sql = "SELECT IDmodule, nom FROM module ";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i=1;
  while($row = $result->fetch_assoc()) {
    echo '<option value="'. $row['IDmodule'] .'">'. $row['nom'] .'</option>';
  }
} else {
  echo "<script> alert('table module vide ou tous les modules sont occupées')</script>";
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
        <a href="tableenseigne.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>