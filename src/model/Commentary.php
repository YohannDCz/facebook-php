<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class Commentary {
    function getCommentary($postId){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT * FROM commentary WHERE post_id = :postId ;");
        $query->bindParam(":postId", $postId);
        //Execution de la Query
        $query->execute();
        $content = [];
        //Recensement des utilisateurs et de leurs données/messages
        while (($row = $query->fetch())) {
            $content = [
                "id"=> $row["id"],
                "post_id"=> $row["post_id"],
                "content"=> $row["content"]
            ];
            $content[] = $Content;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
}