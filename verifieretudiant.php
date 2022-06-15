<?php
$idetudiant =$_GET['Idetudiant'];
$pseudo =$_GET['enseignant'];


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


$select =  "SELECT enseigne.*,enseignant.pseudo,appartient.IDetudiant
FROM((enseigne

      INNER JOIN enseignant ON enseigne.IDenseignant=enseignant.IDenseignant)
      INNER JOIN appartient ON enseigne.IDgroupe=appartient.IDgroupe)
      WHERE enseignant.pseudo='$pseudo' and appartient.IDetudiant='$idetudiant'";
    


$res = mysqli_query($conn,$select);
$st= mysqli_fetch_array($res);


if (!empty($st))
{
    $resultat = 0;
    
}
else{
    $resultat = 1;
}
echo $resultat;

if($resultat=0){
    $s=mysqli_query($conn,"INSERT INTO absence(`IDetudiant`, `IDgroupe`, `date`) VALUES ('$idetudiant','$idgroupe',now())");
}
?>