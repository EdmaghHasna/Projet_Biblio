<?php

if(!isset($_SESSION))
{
session_start();
}
require('config.php');
if (isset($_POST['enrg'])){
if (isset($_POST['nomAu'], $_POST['prenomAu'],$_POST['titre'], $_POST['categories'],$_POST['isbn']))
{
    try
    {
        
        $nom = $_POST['nomAu'] ;
        $prenom = $_POST['prenomAu'];
        $titre = $_POST['titre'];
        $categorie= $_POST['categories'];
        $isbn= $_POST['isbn'];
        $code="$nom[0]" . "$nom[1]" . "$prenom[0]"."$prenom[1]". "$categorie[0]" ."$categorie[1]"."$isbn[0]"."$isbn[1]";
       //print_r($code) ;

        $sql = "INSERT INTO livres (livcode , livnomaut  ,livprenomaut , livtitre  , livcategorie, livISBN ) 
                    VALUES('$code', '$nom', '$prenom','$titre ','$categorie','$isbn')";
                   // echo "bien ajoute" ;
$_SESSION['codel'] = $code;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Validation d'un livre</h1>

    
    <lablel>Nom de l'auteur :<span style='color:green'><?php echo $_POST["nomAu"]?></span></lablel><br>
    <lablel>Prenom de l'auteur :<span style='color:green'> <?php  echo $_POST["prenomAu"] ?></span></lablel><br>
    <lablel>Titre :<span style='color:green'><?php  echo $_POST["titre"] ?></span></lablel><br>
    <lablel>Categories :<span style='color:green'><?php  echo $_POST["categories"] ?></span></lablel><br>
    <lablel>ISBN :<span style='color:green'><?php  echo $_POST["isbn"] ?></span></lablel>
    
    
    
</body>
</html>