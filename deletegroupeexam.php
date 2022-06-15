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

  $sql = "DELETE FROM groupeexam WHERE idgroupeexam='" . $_GET["idgroupeexam"] . "'";


if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
$sql = "DELETE FROM passe WHERE idgroupeexam='" . $_GET["idgroupeexam"] . "'";


if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
$sql = "DELETE FROM surveille WHERE idgroupeexam='" . $_GET["idgroupeexam"] . "'";


if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
$sql = "DELETE FROM surveillance WHERE idgroupeexam='" . $_GET["idgroupeexam"] . "'";


if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>