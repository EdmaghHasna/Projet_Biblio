
<?php
if(!isset($_SESSION))
{
session_start();

}
require('config.php');
if(isset($_POST['log_in'])){
  if (isset($_POST['lectname'],$_POST['lectpsw']))
  {
      
      //Retrieve the field values from our login form.
      $username = $_POST['lectname'];
      $password =$_POST['lectpsw'];
      
    
     
      //Retrieve the user account information for the given username.
      $sql = "SELECT  lecnum,lecmotdepasse,lecnom  FROM lecteurs WHERE lecnom  = :username and lecmotdepasse =:password";
      $stmt = $conn->prepare($sql);
      
      //Bind value.
      $stmt->bindValue(':username', $username);
      $stmt->bindValue(':password', $password);
      
      //Execute.
      $stmt->execute();
      
      //Fetch row.
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
       
        $_SESSION['acces']="non";    
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
      //  $validPassword = password_verify($passwordAttempt, $user['Password']);
        
        //If $validPassword is TRUE, the login has been successful.
      // if($validPassword){
            
            //Provide the user with a login session.
            $_SESSION['acces']="oui";    
         $_SESSION['lecnum'] = $user['lecnum'];
          //print_r($_SESSION);
       //   echo "le lecteur numero :".$user['lecnum']."est reconus" ;
          // print_r($_SESSION['ID']);
            //  $_SESSION['logged_in'] = time();
            
            //Redirect to our protected page, which we called home.php
           // header('Location: Commmandes.php');
           // exit;
            
        // } else{
        //     //$validPassword was FALSE. Passwords do not match.
        //     die('Incorrect username / password combination!');
        // }
    }
      
      
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Gestion du Lecteur</h1>
<table>

<?php 
if(!isset($_SESSION))
{
    session_start();
}
try
{
    if($_SESSION['acces']!="oui") 
        {
            echo "le lecteur n'est pas reconue <br>" ;
            echo "cliquez<a href='login.php'> ici </a> pour essayer une nouvelle identification" ;
            echo "<h2>Enregistrement d'un lecteur</h2>" ;
            echo "Si vous etes un nouveau lecteur , veulliez vous enregistrer <a href='lecteurForm.php'> ici </a> " ;
        
        }
else
        {
            echo "le lecteur n'". $_SESSION['lecnum']." est reconu" ;
            echo "<h3>Voici la listes des ouvreages disponible a la reservation</h3>" ;
          ?> 
          <tr>
                <th>Code Livre</th>
                <th>Nom Auteur</th>
                <th>Prenom Auteur</th>
                <th>Titre</th>
                <th>Categories</th>
                <th>ISBN</th>
                <th>     </th>
          </tr> 
        


            <?php 
            $sql = "SELECT  *  FROM livres";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute();
             
            while($livre = $stmt->fetch())
            
            {
              ?>

                          <tr>  
                               <td><?php echo $livre["livcode"]; ?></td>  
                               <td><?php echo $livre["livnomaut"]; ?></td>  
                               <td><?php echo $livre["livprenomaut"]; ?></td> 
                               <td><?php echo $livre["livtitre"]; ?></td> 
                               <td><?php echo $livre["livcategorie"]; ?></td> 
                               <td><?php echo $livre["livISBN"]; ?></td>  
                              <td> <a href="reserve.php?action=reserver&id=<?php echo $livre["livcode"]; ?>">Reserve</a></td>
                              
                          </tr>  
                     
        <?php 
       
      }
        
        
       



?>

</table>
<h3>Voici la listes de vos reservation :</h3>
<table>
          <tr>
                <th>Code Livre</th>
                <th>Nom Auteur</th>
                <th>Prenom Auteur</th>
                <th>Titre</th>
                <th>Categories</th>
                <th>ISBN</th>
              
          </tr> 


          <?php
          
            $codeLect = $_SESSION['lecnum'] ;
           // print_r($codeLect) ;
            $sql = "SELECT livres.livcode,livres.livnomaut,livres.livprenomaut ,livres.livtitre,livres.livcategorie,livres.livISBN
             FROM livres INNER JOIN emprunts ON
            livres.livcode = emprunts.empcodelivre

            where empnumlect = :id ";
            $stmt = $conn->prepare($sql);
            
            $stmt ->bindValue(':id',$codeLect) ;

            $stmt->execute();
            //$row = $stmt->fetch(PDO::FETCH_ASSOC);
            while($row= $stmt->fetch())
            
            {?>

                          <tr>  
                               <td><?php echo $row["livcode"]; ?></td>  
                               <td><?php echo $row["livnomaut"]; ?></td>  
                               <td><?php echo $row["livprenomaut"]; ?></td> 
                               <td><?php echo $row["livtitre"]; ?></td> 
                               <td><?php echo $row["livcategorie"]; ?></td> 
                               <td><?php echo $row["livISBN"]; ?></td>  
                             
                              
                          </tr>  
                        
                     
        <?php   
        }
        
        
       



?>

</table>

<?php   }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
} ?>
</body>
</html>
