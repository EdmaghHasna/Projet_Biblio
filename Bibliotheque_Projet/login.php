
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<h1>Authentification d'un lecteur </h1>
<form action="gestionLecteur.php" method="post">
  <!-- <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div> -->

  <div class="container">
    <label for="uname"><b>Nom lecteur</b></label>
    <input type="text" placeholder="Enter Username" name="lectname" required>

    <label for="psw"><b>Mot de Passe</b></label>
    <input type="password" placeholder="Enter Password" name="lectpsw" required>

    <button type="submit" name = "log_in">Login</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <!-- <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span> -->
  </div>
</form>
</body>
</html>