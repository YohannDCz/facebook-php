<?php
require_once('../model/Database.php');
require_once('../model/Users.php');

function signup() {
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {

    $user = new Users();

    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone_number = $_POST["phone_number"];
    $mail = $_POST["mail"];


    $resultat = $user->check_user($mail);

    $error = null;

    if ($resultat) {
      echo "L'utilisateur existe déjà";
      // return $error;
      exit();
    }

    setcookie("username", $username);
    setcookie("first_name", $first_name);
    setcookie("last_name", $last_name);
    setcookie("phone_number", $phone_number);
    setcookie("mail", $mail);

    $user->add_user($username, $password, $first_name, $last_name, $phone_number, $mail);

    header("Location: Login.php");
    exit();
  } 
}

function login() {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user = new Users();
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    setcookie("login", $login);

    $query = $user->login($login);

    $userDb = $query->fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $userDb["password"])) {
      $_SESSION["loggedin"] = true;
      header('Location: home.php');
    } else {
      echo "Identifiants invalides";
      exit();
    }
  }
}

function logout() {

  session_start();
  session_destroy();
  header('Location: Login.php');

}

if(isset($_SERVER['HTTP_REFERER'])) {
  $referer = $_SERVER['HTTP_REFERER'];
  if(strpos($referer, "Login.php") !== false) {
      $loginScript = login();
  } elseif(strpos($referer, "Logout.php") !== false) {
      $logoutScript = logout();
  } elseif(strpos($referer, "Signup.php") !== false) {
      $signupScript = signup();
  } else {
      echo "not ok";
      exit();
  }
}

?>