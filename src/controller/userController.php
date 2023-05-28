<?php
require_once('src/model/Database.php');
require_once('src/model/Users.php');


function signup() {

    $user = new Users();

    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);;
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];

    $resultat = $user->checkUser($email);
    $results = isset($resultat["username"]) or isset($resultat["mail"]);

    if ($results) {
      echo "L'utilisateur existe déjà.";
      // return $error;
    } else {
      session_start();
      $_SESSION["username"] = $username;
      $_SESSION["first_name"] = $first_name;
      $_SESSION["last_name"] = $last_name;
      $_SESSION["phone"] = $phone;
      $_SESSION["username"] = $username;
      $_SESSION["email"] = $email;
      $_SESSION["birthdate"] = $birthdate;

      setcookie("username", $username);
      setcookie("first_name", $first_name);
      setcookie("last_name", $last_name);
      setcookie("phone", $phone);
      setcookie("email", $email);
      setcookie("birthdate", $birthdate);

      $user->addUser($username, $password, $first_name, $last_name, $birthdate, $phone, $email);

      login();
    }
}

function login() {
    
    $user = new Users();
    $login = $_POST["name"];
    $password = $_POST["password"];
    
    // setcookie("login", $login);

    $query = $user->login($login);

    $userDb = $query->fetch(PDO::FETCH_ASSOC);
    $error = null;

    if (password_verify($password, $userDb["password"])) {
      $_SESSION["loggedin"] = true;
      $_SESSION["first_name"] = $userDb['first_name'];
      $_SESSION["last_name"] = $userDb['last_name'];

      return true;
    } else {
      $error = "Identifiants invalides";
      setcookie("errorPassword", $error);
      return false;
    }
}


function logout() {

  session_start();
  session_destroy();

}

// if(isset($_SERVER['HTTP_REFERER']) and $_SERVER["REQUEST_METHOD"] === "POST") {
//   $referer = $_SERVER['HTTP_REFERER'];
//   if(strpos($referer, "http://" . $host . "/user/login") !== false) {
//       $loginScript = login();
//   } elseif(strpos($referer, "header.php") !== false) {
//       $logoutScript = logout();
//   } elseif(strpos($referer, "signup.php") !== false) {
//       $signupScript = signup();
//   } else {
//       echo "not ok";
//       exit();
//   }
// }
