<?php
session_start();

require('../../src/model/Users.php');

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $user = new Users();
  $login = $_POST["login"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  
  setcookie("login", $login);
  
  $mail_regex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
  $username_regex = '/^[a-zA-Z0-9_]{3,15}$/';

  if (preg_match($mail_regex, $login)) {
    $query = $user->login("mail");
    echo "C'est une adresse e-mail";
    exit();
    
  } elseif (preg_match($username_regex, $login)) {
    $query = $user->login("username");
    echo "C'est un nom d'utilisateur";
    exit();

  } else {
    echo "Entrée invalide";
    exit();
  }

  $query->bindParam(":login", $login);
  $query->execute();

  $userDb = $requete->fetch(PDO::FETCH_ASSOC);

  if (password_verify($password, $userDb["password"])) {

    $_SESSION["loggedin"] = true;
    
    header('Location: home.php');
    exit();
  } else {
    $error = "Identifiants invalides";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
</head>
<body>

<img src="../assets/images/wallpaper.jpeg" alt="">
<div class="form">
  <h1>Connexion</h1>

  <?php if ($error !== null) : ?>
    <p style="background: #FAA; color: red; padding: .5rem .75rem">
        <?= $error ?>
    </p>
  <?php endif; ?>

  <form method="POST">
      <input class="username" placeholder="Nom d'utilisateur" type="text" name="login" id="login"><br><br>
      <input class="password" placeholder="Mot de passe" type="password" name="password" id="password"><br><br>
      <input class="button" type="submit" value="Login">

      <p class="box-register">Pas encore inscrit? <a href="register.php">Inscrivez-vous ici.</a></p>
  </form>
</div>
</body>
</html>