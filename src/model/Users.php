<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class Users {
    // une fonction qui récupère tous les utilisateurs 
    function getUsers(){

        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->query("SELECT * FROM user");
        $request->execute();

        $users = [];
        while (($row = $request->fetch())) {
            $user = [
                "username"=> $row["username"],
                "first_name"=> $row["first_name"],
                "last_name"=> $row["last_name"],
                "phone"=> $row["phone"],
                "mail"=> $row["mail"],
                "profile_icon"=> $row["profile_icon"],
                "profile_banner"=> $row["profile_banner"],
            ];
            $users[] = $user;
        }

        // Fermeture de la connection
        $connection = null;

        return $users;
    }

    function addUser($username, $password, $first_name, $last_name, $phone, $mail){
        //  Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        // Requêtes SQL

        $sql = 'INSERT INTO "user" (username, password, mail, phone, first_name, last_name)
        VALUES(:username, :password, :mail,:phone,:first_name,:last_name)';

        $query = $connection->prepare($sql);
    
        $username=htmlspecialchars(strip_tags($username));
        $first_name=htmlspecialchars(strip_tags($first_name));
        $last_name=htmlspecialchars(strip_tags($last_name));
        $phone=htmlspecialchars(strip_tags($phone));
        $mail=htmlspecialchars(strip_tags($mail));


        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->bindParam(":first_name", $first_name);
        $query->bindParam(":last_name", $last_name);
        $query->bindParam(":phone", $phone);
        $query->bindParam(":mail", $mail);



        if ($query->execute()){
            $connection = null;
            return true;
        }
        $connection = null;
        return false;
    }

    // Vérifie s'il y a bien un utilisateur existant
    function checkUser($mail){
 
        // Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        
        // Préparation/execution de la requête
        $sql = 'SELECT * FROM "user" WHERE mail = :mail';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();

        // var_dump($stmt);
        
        // Fetch le résultat de la requête
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fermeture de la connection
        $connection = null;

        return $results;
    }

    function getUser($mail){

        //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        
        $sql = 'SELECT * FROM "user" WHERE mail = ?';
        $query = $connection->query($sql);
        $query->bindParam(1,$mail);

        $query->execute();

        // Fetch the results as an associative array
        $results = $query->fetch(PDO::FETCH_ASSOC);

        return $results;
    }

    function login($credential) {
         //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

        $sql = 'SELECT * FROM "user" WHERE ' .$credential. ' = user.username OR '.$credential.' = user.mail';
        $query = $connection->prepare($sql);
        $query->execute();

        return $query;
    }

    function deleteUser($password,$mail) {

        //Connecter la BDD
        $db = new Database();

        //Ouverture de la connection
        $connection = $db->getConnection();

        //Requêtes SQL
            //Vérification de l'identifiant unique 
        $check = 'SELECT mail, password from user WHERE mail = :mail ;';

        $query = $connection->prepare($check);
        $query->bindParam(":mail", $mail);

        //On voit si l'execute passe ou pas
        if (!$query->execute()){
            return false;
            }

        //On voit si les mots de passe sont les mêmes
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result["password"])) {
            //Requêtes SQL
            $query = 'DELETE FROM user WHERE mail = :mail ;';
            $query = $connection->prepare($query);
            $query->bindParam(":mail", $mail);
            return $query->execute();
            }
        }
    }