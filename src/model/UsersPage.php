<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class UsersPage {
    function getUsersPage($id){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT * FROM users_page WHERE user_id = :id ;");
        $query->bindParam(":id", $id);
        //Execution de la Query
        $query->execute();
        $content = [];
        //Recensement des utilisateurs et de leurs données/messages
        while (($row = $query->fetch())) {
            $content = [
                "user_id"=> $row["user_id"],
                "role"=> $row["role"],
                "page_id"=> $row["page_id"]
            ];
            $content[] = $Content;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
}