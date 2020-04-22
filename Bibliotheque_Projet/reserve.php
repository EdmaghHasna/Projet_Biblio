

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Reserver un livre</h1>
    <span style='color:pink'><strong> Vous desirez reserver le livre suivant :</strong></span>
 
    <form method="post" action="confirmationReservation.php" >
    <table>
<?php


    session_start();

require('config.php') ;

    if($_GET['action']=="reserver")
    {
        $_SESSION['livcode'] =  $_GET['id'] ;
        $sql = "select * from livres where livcode= :id" ;
        // prepare data 
        $stmt = $conn->prepare($sql);
        //

        $stmt->bindValue(':id',$_GET['id']) ;
        // execute dta
        $stmt->execute() ;
        //fetch data 
       // $livre= $stmt->fetch(PDO::FETCH_ASSOC) ;

        while( $livre= $stmt->fetch())

        {?>
  
        <tr>
            <td>Code du livre</td>
            <td><?php echo $livre['livcode']?></td>
        </tr>
        <tr>
            <td>Nom de l'auteur</td>
            <td><?php echo $livre['livnomaut']?></td>
        </tr>
        <tr>
            <td>Prenom de l'auteur</td>
            <td><?php echo $livre['livprenomaut']?></td>
        </tr>
        <tr>
            <td>Titre</td>
            <td><?php echo $livre['livtitre']?></td>
        </tr>
        <tr>
            <td>Categories</td>
            <td><?php echo $livre['livcategorie']?></td>
        </tr>
        <tr>
            <td>ISBN</td>
            <td><?php echo $livre['livISBN']?></td>
        </tr>
       <?php $_SESSION['N_reserve'] = $livre['livdejareserve'];?>
       <?php }
        
      
    }

?>

</table>
<br>
<button type="submit" name = "confr">Confirmer</button>
</form>
</body>
</html>


