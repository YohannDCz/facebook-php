<?php
session_start();

require('User.php');

$method = filter_input(INPUT_SERVER, "REQUEST_METHOD");
$error = null;

if ($method == "POST") {

  $user = new User($db);

  $user->login = filter_input(INPUT_POST, "login");
  $user->password = password_hash(filter_input(INPUT_POST, "password"), PASSWORD_DEFAULT);
  
  setcookie("login", $user->login);

  $requete = $user->login();
  $userDb = $requete->fetch(PDO::FETCH_ASSOC);

  if (password_verify($user->password, $userDb["password"])) {

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
    <link rel="stylesheet" type="text/css" href="../assets/styles/style1.css">
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