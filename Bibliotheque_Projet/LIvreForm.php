<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1> Enregistrement d'un Livre</h1>
<form action="validateLivre.php" method="post">
  <!-- <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div> -->

  <div class="container">
    

    <label for="uname"><b>Nom auteur</b></label>
    <input type="text"  name="nomAu" required>

    <label for="psw"><b>Prenom auteur</b></label>
    <input type="text"   name="prenomAu" required>

    <label for="uname"><b>Titre</b></label>
    <input type="text"  name="titre" required>

    <label for="uname"><b>Categories</b></label>
    <select name="categories"> 
        <option value="Roman">Roman</option>
        <option value="Science-fiction">Science-fiction</option>
        <option value="Policier">Policier</option>
        <option value="Junior">Junior</option>
    </select>

    <label for="uname"><b>ISBN</b></label>
    <input type="text"  name="isbn" required>




    

    <button type="submit"  name ="enrg" >Enregistrer</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <!-- <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span> -->
  </div>
</form>
</body>
</html>