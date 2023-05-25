<?php

require_once("src/model/Database.php");
require_once("src/model/Pages.php");

 
//  Connecter la BDD
$db = new Database();
// Ouverture de la connection
$connection = $db->getConnection();
// Requêtes SQL
$name = null;

function getPageInfos() {
    return true;
}
?>