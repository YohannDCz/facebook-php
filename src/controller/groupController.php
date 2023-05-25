<?php
require_once('src/model/Database.php');
require_once('src/model/groups.php');

// déclaration variable globale
global $split_url;


// fonction pour créer un groupe 
function createGroup() {

    $groups = new Groups();

    $name = $_POST["name"];
    $description = $_POST["description"];
    $private = $_POST["private"];
    $last_sent = $_POST["last_sent"];

    $resultat = $user->checkGroups($name);
    $results = isset($resultat["name"]);

    if ($results) {
      $error = "Ce nom de groupe est déjà";
      setcookie("errorAuthentification", $error);
      // return $error;
      exit();
    }

    $user->createGroup($name, $description, $private, $last_sent);    
    exit();
}

//recupere les infos à afficher d'un groupe
function showGroup() {
    
    $groups = new groups();
    $name =$_POST["id"];
    $query = $user->getGroups($name);

    $userDb = $query->fetch(PDO::FETCH_ASSOC);
    $error = null;
}
function showGroupUsers() {
    
    $groups = new groups();
    $id =$_POST["id"];
    $query = $user->getGroupsUsers($id);

    $userDb = $query->fetch(PDO::FETCH_ASSOC);
    $error = null;

}

function deleteGroups() {
    $groups = new groups();
    $id =$_POST["id"];
    $query = $user->deleteGroup($id);

    $userDb = $query->fetch(PDO::FETCH_ASSOC);
    $error = null;

}


?>