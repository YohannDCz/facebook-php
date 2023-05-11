<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';

// Création du controller users

class Users {
    // une fonction qui récupère tous les utilisateurs 
    function getUsers(){
        //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        // Requêtes SQL
        $request = $connection->query("SELECT * FROM users");
        $request->execute();

        $users = [];
        while (($row = $request->fetch())) {
            $users = [
                "fist_name"=> $row["first_name"],
            ];
        }

        return $users;

        // Fermeture de la connection
//        $connection = null;

        // Envoi des données au format JSON
        // header('Content-Type: application/json');
        // echo json_encode($users);
    }
}