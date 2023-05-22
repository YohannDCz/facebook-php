<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class Commentary {
    function getCommentary($userId){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT * FROM user_group WHERE user_id = :userId ;");
        $query->bindParam(":userId", $userId);
        //Execution de la Query
        $query->execute();
        $content = [];
        //Recensement des utilisateurs et de leurs données/messages
        while (($row = $query->fetch())) {
            $content = [
                "user_id"=> $row["user_id"],
                "role"=> $row["role"],
                "group_id"=> $row["group_id"]
            ];
            $content[] = $Content;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
}