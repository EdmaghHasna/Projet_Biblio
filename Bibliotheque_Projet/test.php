<?php

// $random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ); // random(ish) 5 digit int

// $random_string ="hs" . "uj". "hj" ."jksd". "jk"; // random(ish) 5 character string

// echo $random_string  ;

?>



<?php

if(!isset($_SESSION))
{
session_start();
}
require('config.php');
if (isset($_POST['enrg'])){
if (isset($_POST['codel'],$_POST['nomAu'], $_POST['prenomAu'],$_POST['titre'], $_POST['categories'],$_POST['isbn']))
{
    try
    {
        $code = $_POST['codel'] ;
        $nom = $_POST['nomAu'] ;
        $prenom = $_POST['prenomAu'];
        $titre = $_POST['titre'];
        $categorie= $_POST['categories'];
        $isbn= $_POST['isbn'];
        
       $codeliv="$nom[0]" . "$nom[1]" . "$prenom[0]"."$prenom[1]". "$categorie[0]" ."$categorie[1]"
       ."$isbn[0]"."$isbn[1]";// random(ish) 5 character string

 echo $random_string  ;

       

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
    



    
}
}

?>
