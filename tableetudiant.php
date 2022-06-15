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
$tableName="etudiant";
$columns= ['idetudiant', 'nom','prenom','nu','promo', 'email'];
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
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY nom";
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
<link rel="stylesheet" href="stylee.css"></head>
<body>


<div class="container">
<div class="search__container">
        <input class="search__input" type="text" placeholder="Search">
    </div>
 <div class="row">
   <div class="col-sm-8">
   <div class="txt"><h2>Table <b>Etudiant</b></h2></div>
   <div class="col-sm-4">
   <button type="button" class="btn btn-info add-new"> <a href="etudiant.php">Ajouter</a> </button>
</div>
</div>
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>
         
         <th>NOM</th>
         <th>PRENOM</th>
         <th>NU</th>
         <th>PROMO</th>
         <th>EMAIL</th>
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
    
      <td><?php echo $data['nom']; ?></td>
      <td><?php echo $data['prenom']; ?></td>
      <td><?php echo $data['nu']; ?></td>
      <td><?php echo $data['promo']; ?></td>
      <td><?php echo $data['email']; ?></td>
      
      <td class="btn">
      <button class="btndelete"><a href="delete.php?idetudiant=<?php echo $data["idetudiant"]; ?>">Supprimer</a></button>

      <button class="btnedit">
      <a href="edit.php?idetudiant=<?php echo $data["idetudiant"]; ?>">Modifier</a>
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