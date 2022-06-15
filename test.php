<?php
  $host = 'localhost';
  $dbname = 'nfc';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT appartient.*,etudiant.nom,etudiant.prenom,groupe.nom
  FROM((appartient
  
        INNER JOIN etudiant ON appartient.IDetudiant=etudiant.IDetudiant)
        INNER JOIN groupe ON appartient.IDgroupe=groupe.IDgroupe)";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="stylee.css"></head>
<body>
<div class="container">
 <div class="row">
 <div class="col-sm-8">
   <div class="txt"><h2>Table <b>Appartient</b></h2></div>
   <div class="col-sm-4">
   <button type="button" class="btn btn-info add-new"> <a href="appartient.php">Ajouter</a> </button>
</div>
</div>
<div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>
         <th>ID Etudiant </th>
         <th>ID Groupe</th>
         <th>nom</th>
         <th>prenom</th>
         <th>nom groupe</th>
         <th>ACTION</th>
         </tr>
    </thead>
    <tbody>
    <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['idetudiant']??''; ?></td>
      <td><?php echo $data['idgroupe']??''; ?></td>
      <td><?php echo $data['nom']??''; ?></td>
      <td><?php echo $data['prenom']??''; ?></td>
      <td><?php echo $data['nom']??''; ?></td>
     

      
      <td class="btn"><form action='delete.php'?name="<?php echo $data['idetudiant']; ?>"method="post">
<input type="hidden" name="idetudiant" value="<?php echo $data['idetudiant']; ?>" class="btndelete">
<input type="submit" name="submit" value="Supprimer" class="btndelete">

<form action='edit.php'?name="<?php echo $data['idetudiant']; ?>"method="post">
<input type="hidden" name="idetudiant" value="<?php echo $data['idetudiant']; ?>" class="btnedit">
<input type="submit" name="submit" value="Modifier" class="btnedit">
      </td>
     </tr>
     <tr>
        <td colspan="8">
        </td>
      </tr>
      </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>