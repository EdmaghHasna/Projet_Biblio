<?php 
session_start();
require('config.php') ;
try
{ if(isset($_POST["confr"]))
    {
      if(isset($_SESSION['livcode'],$_SESSION['lecnum'] ,$_SESSION['N_reserve']))
      {
        
                $_SESSION['N_reserve']++; 
                        
               
                 $date_debut = date("Y-m-d");
                 $date_fin = date("Y-m-d", strtotime($date_debut.'+ 5 days'));
                 $codeliv = $_SESSION['livcode'] ;
                 $codeLect = $_SESSION['lecnum'] ;
                 $numEmpr="$codeLect[0]" . "$codeLect[1]" . "$codeliv[0]"."$codeliv[1]". "$codeliv[2]" ."$codeliv[3]";
                

                 echo "<h1>Confirmation de votre reservation</h1>" ;
                 echo   "Votre reservation est confirmee sous le numero     :     ".$numEmpr."<br>" ;
                 echo "Date de reservation      :      ".$date_debut."<br>" ;
                 echo "Date de retour      :      ".$date_fin."<br><br>"; 


                 $sql = "UPDATE  livres set livdejareserve='".$_SESSION['N_reserve']."'where livcode ='".$codeliv ."'";
                 $sql2 = "INSERT INTO emprunts ( empnum, empdate ,  empdateret, empcodelivre , empnumlect ) 
                 VALUES ('$numEmpr','$date_debut','$date_fin','$codeliv','$codeLect') "   ;       
    
                $conn->exec($sql);
                $conn->exec($sql2);
               
        }
    }
    
        }catch(PDOException $e) {
         //  echo "Error: " . $e->getMessage();
        }
            
//header('confirmationReservation.php') ;
  

session_destroy() ;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'une reservation</title>
</head>
<body>
 
 <button type="submit" name = "log_in"><a href="logout.php?action=logout">Logout</a> </button>
</body>
</html>

