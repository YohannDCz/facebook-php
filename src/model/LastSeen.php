<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class LastSeen {
    // une fonction qui dit quand est-ce que un utilisateur a été vu pour la dernière fois
    function getLastSeen($userid){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT * FROM last_seen WHERE user_id = :userId;");
        $query->bindParam(":userId", $userId);
        //Execution de la Query
        $query->execute();
        $lastSeen = [];
        //Recensement des utilisateurs et de la dernière fois à la quelle on les a vus
        while (($row = $query->fetch())) {
            $lastSeen = [
                "user_id"=> $row["user_id"],
                "last_seen_at"=> $row["last_seen_at"]
            ];
            $lastSeen[] = $lastSeen;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
    function getUserLastSeen($userid){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT user.first_name, user.last_name, user.username, user.profile_icon, last_seen.last_seen_at FROM last_seen INNER JOIN user WHERE last_seen.user_id = :userId;");
        $query->bindParam(":userId", $userId);
        //Execution de la Query
        $query->execute();
        $lastSeen = [];
        //Recensement des utilisateurs et de la dernière fois à la quelle on les a vus
        while (($row = $query->fetch())) {
            $lastSeen = [
                "username"=> $row["username"],
                "first_name"=> $row["first_name"],
                "last_name"=> $row["last_name"],
                "profile_icon"=> $row["profile_icon"],
                "last_seen_at"=> $row["last_seen_at"]
            ];
            $lastSeen[] = $lastSeen;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
}