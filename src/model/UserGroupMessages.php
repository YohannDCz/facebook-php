<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class UserGroupMessages {
    function getGroupMessages($id){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT * FROM user_group_messages WHERE sender = :id ;");
        $query->bindParam(":id", $id);
        //Execution de la Query
        $query->execute();
        $content = [];
        //Recensement des utilisateurs et de leurs données/messages
        while (($row = $query->fetch())) {
            $content = [
                "id"=> $row["id"],
                "sender"=> $row["sender"],
                "reply_to"=> $row["reply_to"],
                "group_id"=> $row["group_id"],
                "timestamp"=> $row["timestamp"],
                "content"=> $row["content"]
            ];
            $content[] = $Content;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
}