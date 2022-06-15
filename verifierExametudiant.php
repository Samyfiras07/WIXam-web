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


$select =  "SELECT surveille.*,enseignant.pseudo,passe.IDetudiant
FROM(
    (surveille INNER JOIN enseignant ON surveille.IDenseignant=enseignant.IDenseignant)
      INNER JOIN passe ON surveille.IDgroupeExam=passe.IDgroupeExam)
      WHERE enseignant.pseudo='$pseudo' and passe.IDetudiant='$idetudiant';";


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
?>