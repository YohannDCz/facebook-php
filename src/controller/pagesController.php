<?php

require("src/model/Database.php");
require("src/model/Pages.php");
  
 //  Connecter la BDD
$db = new Database();
// Ouverture de la connection
$connection = $db->getConnection();
// Requêtes SQL
$name = null;

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    setcookie("name", $name);
} else {
    echo "Name parameter not provided!";
}

$pages = new Pages();

[$page, $idPage, $namePage, $iconProfile, $bannerProfile] = $pages->setPage($name, $connection);

$postCount = null;
$posts = null;

?>