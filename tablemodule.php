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
?>
<?php
$db= $conn;
$tableName="module";
$columns= ['idmodule', 'nom','nu','semestre'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY idmodule";
$result = $db->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="stylee.css">
</head>
<body>
<div class="container">
 <div class="row">
 <div class="col-sm-8">
   <div class="txt"><h2>Table <b>Module</b></h2></div>
   <div class="col-sm-4">
   <button type="button" class="btn btn-info add-new"> <a href="module.php">Ajouter</a> </button>
</div>
</div>
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>
         <th>ID </th>
         <th>NOM</th>
         <th>NU</th>
         <th>SEMESTRE</th>
         <th>ACTION</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['idmodule']??''; ?></td>
      <td><?php echo $data['nom']??''; ?></td>
      <td><?php echo $data['nu']??''; ?></td>
      <td><?php echo $data['semestre']??''; ?></td>

      
      <td class="btn">
      <button class="btndelete">
      <a href="deletemodule.php?idmodule=<?php echo $data["idmodule"]; ?>">Supprimer</a>
      </button>

      <button class="btnedit">
      <a href="edit.php?idmodule=<?php echo $data["idmodule"]; ?>">Modifier</a>
      </button>
      </td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
     <div class="col-sm-8">
   <div class="col-sm-4">
   <button type="button" class="btn btn-info add-new"> <a href="home.html">Retour</a> </button>
</div>
</div>
   </div>
</div>
</div>
</div>
</body>
</html>