<?php

if(!isset($_SESSION))
{
session_start();
}
require('config.php');
if (isset($_POST['user'])){
if (isset($_POST['code'],$_POST['nom'], $_POST['prenom'],$_POST['psw'],$_POST['adresse'],$_POST['postal'],$_POST['ville']))
{
    try
    {
        $code = $_POST['code'] ;
        $nom = $_POST['nom'] ;
        $prenom = $_POST['prenom'] ;
        $password = $_POST['psw'];
        $adresse = $_POST['adresse'];
        $postal= $_POST['postal'];
        $ville= $_POST['ville'];
        
        
        $sql = "INSERT INTO lecteurs (lecnum ,lecnom ,lecprenom ,lecadresse , lecville , leccodepostal , lecmotdepasse ) 
                    VALUES('$code', '$nom', '$prenom','$adresse','$ville','$postal','$password ')";
                    
         $_SESSION['code'] = $code;
        // use exec() because no results are returned
        $conn->exec($sql);

}catch(PDOException $e) {
   //echo "Error: " . $e->getMessage();
}
    



    
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Validation d'un Lecteur</h1>

  <?php
                        //   try{
//   $sql = "SELECT lecnum  , lecnom  , lecprenom , lecadresse , lecville, leccodepostal, lecmotdepasse , 
// FROM lecteurs 
//  WHERE lecnum = :id";
//     $stmt = $conn->prepare($sql);
//     $id = $_SESSION['code']  ;
//     //Bind value.
//     $stmt->bindValue(':id', $id);
//   // $stmt->bindValue(':password', $password);
    
//     //Execute.
//      $stmt->execute();
//      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//      $total = 0;
//     while ($row = $stmt->fetch()) {
        
        
        ?>








<lablel>Nom : <?php echo $_POST["nom"]?></lablel><br>
<lablel>Prenom :<?php echo $_POST["prenom"]?></lablel><br>
<lablel>Adresse : <?php  echo $_POST["adresse"] ?></lablel><br>
<lablel>Ville :<?php  echo $_POST["ville"] ?></lablel><br>
<lablel>Code Postal :<?php  echo $_POST["postal"] ?></lablel><br>
<lablel>Numero :<?php  echo $_POST["code"] ?></lablel>

<p>vous avez maintenant la possibilte de reserve des livre ou vous <a href="login.php">identifiant ici</a></p>


</body>
</html>