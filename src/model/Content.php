<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';

class Content {

    function add_page($name, $profile_icon, $profile_banner) {  
      $db = new Database();
      // Ouverture de la connection
      $connection = $db->getConnection();
      // Requêtes SQL

      $sql = 'INSERT INTO "pages" (name, profile_icon, profile_banner)
      VALUES(:name, :profile_icon, :profile_banner)';

      $query = $connection->prepare($sql);
  
      $name=htmlspecialchars(strip_tags($name));

      $query->bindParam(":name", $name);
      $query->bindParam(":profile_icon", $profile_icon);
      $query->bindParam(":profile_banner", $profile_banner);
    
      if ($query->execute()){
          return true;
      }
      return false;
    }
}
?>!