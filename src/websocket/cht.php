<!Doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<?php
require_once "../model/Database.php";

//fonction de génération de token
function generateToken() {
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $characterNumber = strlen($characters);
    $token = "";
    for ($i=0; $i <  14; $i++) {
        $token .= $characters[rand(0,$characterNumber - 1)];
    }
    return $token;
}


class Users {

  function connectUser() {
      //Connecter la BDD
      $db = new Database();
      // Ouverture de la connection
      $connection = $db->getConnection();

      $username = filter_input(INPUT_GET, 'username');
      $password = filter_input(INPUT_GET, 'password');

      if($username && $password) {
          // Requêtes SQL
          $request = $connection->prepare("SELECT id, password, mail FROM public.user WHERE username = :username");
          $request->execute([":username" => $username]);
          $userInfos = $request->fetchAll(PDO::FETCH_ASSOC);
          if ($userInfos) {
                  session_start();

                  $_SESSION['username'] = $username;
                  $_SESSION['id'] = $userInfos[0]['id'];
                  $_SESSION['mail'] = $userInfos[0]['mail'];


          }

      }

      // Fermeture de la connection
      $connection = null;
  }
}

if (isset($_GET["username"]) and isset($_GET["password"])) {
    $user = new Users();
    $user->connectUser();

}

?>

<?php if(!(isset($_GET["username"]) and isset($_GET["password"]))) : ?>
<form action="" method="get">

    <label>
        username:
        <input type="text" name="username">
    </label>
    <br>
    <label>
        password:
        <input type="text" name="password">
    </label><br>
    <input type="submit">
</form>
</body>
</html>
<?php endif; ?>