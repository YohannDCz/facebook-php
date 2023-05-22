<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class PM {
    function getPrivateMessages($id){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT * FROM private_messages WHERE sender = :id or receiver = :id 
        ;");
        $query->bindParam(":id", $id);
        //Execution de la Query
        $query->execute();
        $content = [];
        //Recensement des utilisateurs et de leurs données/messages
        while (($row = $query->fetch())) {
            $content = [
                "id"=> $row["id"],
                "receiver"=> $row["receiver"],
                "sender"=> $row["sender"],
                "timestamp"=> $row["timestamp"],
                "content"=>$row["content"]
            ];
            $content[] = $Content;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
    // une fonction qui récupère les messages privés
    function getUserPrivateMessages($idReceiver,$idSender){
        
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT user.first_name, user.last_name, user.username, user.profile_icon, user.is_online , private_messages.content , private_messages.timestamp FROM private_messages, 
        INNER JOIN user ON private_messages.sender = user.id or private_messages.receiver = user.id ,
        WHERE private_messages.sender = :idReceiver or private_messages.receiver = :idSender;");
        $query->bindParam(":idReceiver", $idReceiver);
        $query->bindParam(":idSender", $idSender);
        //Execution de la Query
        $query->execute();

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
}