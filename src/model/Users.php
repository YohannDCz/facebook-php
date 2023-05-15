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

    public function add_user($username, $password, $first_name, $last_name, $phone, $mail, $profile_icon, $profile_banner){
        //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        // Requêtes SQL

        $sql = 'INSERT INTO "user" (username, password, mail, phone, first_name, last_name, profile_icon, profile_banner)
        VALUES(:username, :password, :mail,:phone,:first_name,:last_name,:profile_icon, :profile_banner)';

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
        $query->bindParam(":profile_icon", $profile_icon);
        $query->bindParam(":profile_banner", $profile_banner);
    
        if ($query->execute()){
            return true;
        }
        return false;
    }

    function login($username, $mail) : PDOStatement {
        $table = "user";
        $sql = "SELECT * FROM ".$table." WHERE username = :username";

         //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        $query = $connection->prepare($sql);

        $mail_regex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
        $username_regex = '/^[a-zA-Z0-9_]{3,15}$/';

        if (preg_match($mail_regex, $username)) {

            $query->bindParam(":username", $mail);
            echo "C'est une adresse e-mail";
            
        } elseif (preg_match($username_regex, $username)) {

            $query->bindParam(":username", $username);
            echo "C'est un nom d'utilisateur";

        } else {

            echo "Entrée invalide";

        }

        $query->execute();

        return $query;
    }
}