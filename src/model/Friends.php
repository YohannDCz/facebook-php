<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class Friends {
    // une fonction qui récupère tous les Amis des utilisateurs 
    function getFriends($id){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT user.first_name, user.last_name, user.username, user.profile_icon, user.is_online FROM friends 
        INNER JOIN user ON friends.friend_id = user.id 
        WHERE friends.owner_id = :id");
        
        $query->bindParam(":id", $id);
        //Execution de la Query
        $query->execute();
        $friends = [];
        //Recensement des amis et de leurs données 
        while (($row = $query->fetch())) {
            $friends = [
                "username"=> $row["username"],
                "first_name"=> $row["first_name"],
                "last_name"=> $row["last_name"],
                "is_online"=> $row["is_online"],
                "profile_icon"=> $row["profile_icon"],
            ];
            $friends[] = $friends;
        }

        // Fermeture de la connection
        $connection = null;

        return $friends;
    }

}