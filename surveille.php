<?php
	 // partie 1 	
	if(isset($_GET['groupeexam'])&&isset($_GET['enseignant']))
	{ 
		
		foreach($_GET['enseignant'] AS $val){$idenseignant[]= $val;}
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
		
		$stmt = $conn->prepare("INSERT INTO surveille (idenseignant, idgroupeexam) VALUES (?, $idgroupeexam)");
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
	<title>Surveille</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<form name="form1" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<div class="wrapper">


<div class="form">



    <div class="title">
        Surveille
    </div>

    <div class="inputfield">
          <label>ID Enseignant</label>


          <select name="enseignant[]" multiple size="6">

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
          <label>ID Groupe Examen</label>
          <select name="groupeexam" size="3">

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


$sql = "SELECT IDgroupeexam, nom FROM groupeexam ";

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
        <a href="tablesurveille.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>