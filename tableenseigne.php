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
$tableName="enseigne";
$columns= ['idenseignant', 'idgroupe','idsalle','idmodule','date'];
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
$query = "SELECT enseigne.*,enseignant.nom,groupe.nom AS nomg,salle.num,salle.localS,module.nom AS nomm
FROM((((enseigne

      INNER JOIN enseignant ON enseigne.IDenseignant=enseignant.IDenseignant)
      INNER JOIN groupe ON enseigne.IDgroupe=groupe.IDgroupe)
      INNER JOIN salle ON enseigne.IDsalle=salle.IDsalle)
      INNER JOIN module ON enseigne.IDmodule=module.IDmodule) order by nom";
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
<div class="search__container">
        <input class="search__input" type="text" placeholder="Search">
    </div>
 <div class="row">
 <div class="col-sm-8">
   <div class="txt"><h2>Table <b>Enseigne</b></h2></div>
   <div class="col-sm-4">
   <button type="button" class="btn btn-info add-new"> <a href="enseigne.php">Ajouter</a> </button>
</div>
</div>
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>
         <th>Nom enseignant </th>
         <th>Nom Groupe</th>
         <th>NUM Salle</th>
         <th>LOCAL Salle</th>
         <th>Module</th>
         <th>Date</th>
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
      <td><?php echo $data['nom']??''; ?></td>
      <td><?php echo $data['nomg']??''; ?></td>
      <td><?php echo $data['num']??''; ?></td>
      <td><?php echo $data['localS']??''; ?></td>
      <td><?php echo $data['nomm']??''; ?></td>
      <td><?php echo $data['date']??''; ?></td>
     
      

      
      <td class="btn">
        <button class="btndelete">
      <a href="deleteenseigne.php?IDenseignant=<?php echo $data["IDenseignant"]; ?>">Supprimer</a>
      </button>

      <button class="btnedit">
      <a href="edit.php?IDenseignant=<?php echo $data["IDenseignant"]; ?>">Modifier</a>
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