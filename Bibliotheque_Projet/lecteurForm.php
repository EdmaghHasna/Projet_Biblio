<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1> Enregistrement d'un Lecteur</h1>
<form action="validateLecteur.php" method="post">
  <!-- <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div> -->

  <div class="container">

    <label for="uname"><b>CIN </b></label>
    <input type="text" placeholder="Entrer Code" name="code" required>

    <label for="uname"><b>Nom</b></label>
    <input type="text" placeholder="Entrer Nom" name="nom" required>

    <label for="uname"><b>Prenom</b></label>
    <input type="text" placeholder="Entrer prenom" name="prenom" required>

    <label for="psw"><b>Mot de pass</b></label>
    <input type="password" placeholder="Entrer mot de pass" name="psw" required>

    <label for="uname"><b>Adresse</b></label>
    <input type="text" placeholder="Entrer adresse" name="adresse" required>

    <label for="uname"><b>Code Postal</b></label>
    <input type="text" placeholder="Entrer code postal" name="postal" required>

    <label for="uname"><b>Ville</b></label>
    <input type="text" placeholder="Entrer ville" name="ville" required>




    

    <button type="submit" name="user">Enregistrer</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <!-- <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span> -->
  </div>
</form>
</body>
</html>