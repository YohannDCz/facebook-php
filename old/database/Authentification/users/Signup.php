<?php
session_start();

require_once('../../src/model/Database.php');
require_once('../../src/model/Users.php');

$method = $_SERVER["REQUEST_METHOD"];

if($method == "POST")
{

  $user = new Users();

  $username = $_POST["username"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $phone_number = $_POST["phone_number"];
  $email = $_POST["email"];
  $profile_icon = $_POST["profile_icon"];
  $profile_banner = $_POST["profile_banner"];

  setcookie("username", $username);
  setcookie("first_name", $first_name);
  setcookie("last_name", $last_name);
  setcookie("phone_number", $phone_number);
  setcookie("email", $email);
  setcookie("profile_icon", $profile_icon);
  setcookie("profile_banner", $profile_banner);

  $user->add_user($username, $password, $first_name, $last_name, $phone_number, $email, $profile_icon, $profile_banner);

  header("Location: Login.php");
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
    <input type="text" class="box-input" name="first_name" placeholder="first_name" required />
    <input type="text" class="box-input" name="last_name" placeholder="last_name" required />
    <input type="text" class="box-input" name="phone_number" placeholder="phone_numer" required />
    <input type="text" class="box-input" name="profile_icon" placeholder="profile_icon" required />
    <input type="text" class="box-input" name="profile_banner" placeholder="profile_banner" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="button" />
    <p class="box-register">Déjà inscrit? <a href="username.php">Connectez-vous ici.</a></p>
  </form>
</div>
</body>
</html> 