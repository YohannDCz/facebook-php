<?php

require("src/model/Database.php");
require("src/model/Pages.php");
  
 //  Connecter la BDD
$db = new Database();
// Ouverture de la connection
$connection = $db->getConnection();
// Requêtes SQL
$name = null;
?>