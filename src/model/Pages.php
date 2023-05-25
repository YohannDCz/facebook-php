<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class Pages {
    // une fonction qui montre la page d'un utilisateur
    function getPages($id){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT * FROM pages WHERE id = :id ;");
        $query->bindParam(":id", $id);
        //Execution de la Query
        $query->execute();
        $content = [];
        //Recensement des utilisateurs et de leurs données/messages
        while (($row = $query->fetch())) {
            $content = [
                "id"=> $row["id"],
                "name"=> $row["name"],
                "profile_icon"=> $row["profile_icon"],
                "profile_banner"=> $row["profile_banner"],
            ];
            $content[] = $Content;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
    //Permets de récupérer la page et les utilisateurs affiliés aux pages
    function GetUserPage($pageId,$userId){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT user.first_name, user.last_name, user.username, pages.profile_icon, pages.profile_banner, pages.name FROM pages INNER JOIN users_page ON pages.id = users_page.page_id INNER JOIN user ON users_pages.user_id = user.id  WHERE user.user_id = :userId and page.pageId = :pageId;");
        $query->bindParam(":userId", $userId);
        $query->bindParam(":pageId", $pageId);
        //Execution de la Query
        $query->execute();

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
    //Permets de supprimer la page
    function deletePage($pageId) {
     //Connecter la BDD
     $db = new Database();

     // Ouverture de la connection
     $connection = $db->getConnection();

     // Requêtes SQL
     $query = $connection->query("DELETE FROM pages WHERE id = :pageId ;");
     $query->bindParam(":pageId", $pageId);
     //Execution de la Query
     $query->execute();

     // Fermeture de la connection
     $connection = null;

     return $content;
    }
    //Permets de mettre à jour la page
    function updatePage($pageId,$profile_icon,$profile_banner,$content) {
        //Connecter la BDD
        $db = new Database();
   
        // Ouverture de la connection
        $connection = $db->getConnection();
   
        // Requêtes SQL
        $query = $connection->query("UPDATE pages SET name = :name, profile_icon = :profile_icon, profile_banner = :profile_banner , content = :content WHERE id = :pageId");
        $query->bindParam(":pageId", $pageId);
        $query->bindParam(":profile_icon", $profile_icon);
        $query->bindParam(":profile_banner", $profile_banner);
        $query->bindParam(":content", $content);
        //Execution de la Query
        $query->execute();
   
        // Fermeture de la connection
        $connection = null;
   
        return $content;
    }
}