<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';

class Groups
{
    // fonction qui récupère tous les groupes d'un utilisateur
    function getGroups($id)
    {
        //  Connection à la la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("SELECT * FROM \"groups\" WHERE \"groups\".id IN ( SELECT user_group.group_id FROM user_group WHERE user_group.user_id = :id )");
        $request->bindParam(":id", $id);
        $request->execute();

        $groups = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $groups;
    }

    //  fonction qui récupère toutes les ids des utilisateurs d'un groupe
    function getGroupUsers($group_id) {
        //  Connection à la la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("SELECT * FROM user_group WHERE user_group.group_id = :group_id");
        $request->bindParam(":group_id", $group_id);
        $request->execute();

        $users = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $users;
    }

//    fonction qui creer un groupe
    function createGroup($name, $description, $private, $timestamp){
        // connect bdd
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        $request = $connection->prepare("INSERT INTO \"groups\" (name, description, private,timestampz) VALUES (:name, :description, :private, :timestamp)");
        $request->bindParam(":name", $name);
        $request->bindParam(":description", $description);
        $request->bindParam(":private", $private);
        $request->bindParam(":timestamp", $timestamp);

        if ($request->execute()){
            return false;
        }
    }

    // fonction pour tej un groupe
    function deleteGroup($id)
    {
        // connect bdd
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        $request = $connection->prepare("DELETE FROM \"groups\" WHERE id = :group_id");
        $request->bindParam(":group_id", $group_id);


        if ($request->execute()){
            return false;
        }

    }

    
    function checkGroups($name){
 
        // Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        
        // Préparation/execution de la requête
        $sql = 'SELECT * FROM "groups" WHERE  name = :name ';
        $query = $connection->prepare($sql);
        $query->execute([
            ":name" => $name,
        ]);
        $query->execute();

        // var_dump($stmt);
        
        // Fetch le résultat de la requête
        $results = $query->fetch(PDO::FETCH_ASSOC);

        // Fermeture de la connection
        $connection = null;

        return $results;
    }
}