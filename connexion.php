<?php
$pseudo =$_GET['username'];
$motdepasse =$_GET['password'];

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

$select =  "SELECT pseudo , motdepasse FROM enseignant WHERE pseudo ='$pseudo' and motdepasse ='$motdepasse'";
$res = mysqli_query($conn,$select);

$st= mysqli_fetch_array($res);

if(!empty($st)){
$resultat=0;
}
else{
    $resultat=1;
}
echo $resultat;
?>