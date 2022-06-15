<?php
	 // partie 1 	
	if(isset($_GET['salle'])&&isset($_GET['groupeexam']))
	{ 
		
		foreach($_GET['groupeexam'] AS $val){$idgroupeexam[]= $val;}
		$idsalle = $_GET['salle'];
		
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
		
		$stmt = $conn->prepare("INSERT INTO surveillance (idgroupeexam, idsalle) VALUES (?, $idsalle)");
		$stmt->bind_param("i", $idgroupeexam);
		
		foreach($idgroupeexam as $groupeexam){
			$idgroupeexam = $groupeexam;
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
	<title>Surveillance</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<form name="form1" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="wrapper">
    <div class="title">
        Surveillance
    </div>
    <div class="form"> 
        <div class="inputfield">
          <label>ID Groupe Examen</label>
          <select name="groupeexam[] "multiple size="3">

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
          <label>Date</label>
          <input type="datetime-local" class="input">
       </div> 
      <div class="inputfield">
        <input type="submit" value="Enregistrer" class="btn">
      </div>
      <div class="inputfield">
        <a href="tablesurveillance.php" class="btn">Consulter</a>
      </div>
      <div class="inputfield">
        <a href="home.html" class="btn">Retour</a>
      </div>
    </div>
</div>	
</form>
</body>
</html>