<?php
session_start();

require_once('Database.php');
require_once('Users.php');

$method = filter_input(INPUT_SERVER, "REQUEST_METHOD");
if($method == "POST")
{
  $user = new User($db);
  $user->login = filter_input(INPUT_POST, "login");
  $user->password = password_hash(filter_input(INPUT_POST, "password"), PASSWORD_DEFAULT);
  $user->first_name = filter_input(INPUT_POST, "first_name");
  $user->last_name = filter_input(INPUT_POST, "last_name");
  $user->phone_number = filter_input(INPUT_POST, "phone_number");
  $user->email = filter_input(INPUT_POST, "email");
  $user->profile_icon = filter_input(INPUT_POST, "profile_icon");
  $user->profile_banner = filter_input(INPUT_POST, "profile_banner");

  setcookie("login", $User->login);
  setcookie("first_name", $User->first_name);
  setcookie("last_name", $User->last_name);
  setcookie("phone_number", $User->phone_number);
  setcookie("email", $User->email);
  setcookie("profile_icon", $User->profile_icon);
  setcookie("profile_banner", $User->profile_banner);

  $User->add_user();

  header("Location: login.php");
  exit();
} 
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css" />
</head>
<body>
<img src="images/wallpaper.jpeg" alt="">
<div class="form">
  <form class="box" action="" method="POST">
    <h1 class="box-title">S'inscrire</h1>
    <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici.</a></p>
  </form>
</div>
</body>
</html> 