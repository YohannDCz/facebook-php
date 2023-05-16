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
                "first_name"=> $row["first_name"],
            ];
        }

        return $users;
    }
        // Fermeture de la connection
        $connection = null;

        // Envoi des données au format JSON
        // header('Content-Type: application/json');
        // echo json_encode($users);

    function add_user($username, $password, $first_name, $last_name, $phone, $mail){
        //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        // Requêtes SQL

        $sql = 'INSERT INTO "user" (username, password, mail, phone, first_name, last_name)
        VALUES(:username, :password, :mail,:phone,:first_name,:last_name)';

        $query = $connection->prepare($sql);
    
        $username=htmlspecialchars(strip_tags($username));
        $first_name1=htmlspecialchars(strip_tags($first_name));
        $last_name1=htmlspecialchars(strip_tags($last_name));
        $phone=htmlspecialchars(strip_tags($phone));
        $mail1=htmlspecialchars(strip_tags($mail));

        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->bindParam(":first_name", $first_name1);
        $query->bindParam(":last_name", $last_name1);
        $query->bindParam(":phone", $phone);
        $query->bindParam(":mail", $mail1);
    
        if ($query->execute()){
            return true;
        }
        return false;
    }


    function check_user($mail){
 
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

        return $results;
        // Vérifie s'il y a bien un utilisatuer existant
    }

    function read_user($mail){

        //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        
        $sql = 'SELECT * FROM "user" WHERE mail = ?';
        $query = $connection->query($sql);
        $query->bindParam(1,$mail);

        $query->execute();

        // Fetch the results as an associative array
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return [$results["username"], 
                $results["password"], 
                $results["first_name"], 
                $results["last_name"], 
                $results["phone"], 
                $results["mail"],
                $results["profile_icon"],
                $results["profile_banner"]
            ];
        
    }

    function login($credential) : PDOStatement {
         //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $sql = 'SELECT * FROM "user" WHERE ' .$credential. ' = :login';
        $connection = $db->getConnection();
        $query = $connection->prepare($sql);
    
        return $query;
    }

    function deleteUser($password,$mail) {
        //Connecter la BDD
        $db = new Database();
        //Ouverture de la connection
        $connection = $db->getConnection();
        //Requêtes SQL
        $check = 'SELECT mail,password from user WHERE mail = :mail ;';
        //Vérification de l'identifiant unique 
        $query = $connection->prepare($check);
        $query->bindParam(":mail", $mail);
        if ($query->execute()){
            //On voit si les mots de passe sont les mêmes
            if (password_verify(query["$password"], password_hash($password))) {
                //Requêtes SQL
                $sql = 'DROP FROM user WHERE mail = :mail and password = :password ;';
                $query = $connection->prepare($sql);
                $mail1=htmlspecialchars(strip_tags($mail));
                $query->bindParam(":password", $password);
                $query->bindParam(":mail", $mail1);
                if ($query->execute()){
                    return true;
                }
                return false;
            }
        }
        return false;
    }
}