<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class Users {
    // une fonction qui récupère tous les utilisateurs 
    //récupère Les infos d'un utilisateur
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
                "birthdate" => $row["birthdate"],
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
    //Ajoute un utilisateur
    function addUser($username, $password, $first_name, $last_name,$birthdate, $phone, $mail){
        //  Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        // Requêtes SQL

        $sql = 'INSERT INTO "users" (first_name, last_name, username, mail, phone, password, birthdate)
        VALUES(:first_name, :last_name, :username, :mail, :phone, :password, :birthdate)';

        $query = $connection->prepare($sql);
    
        $username=htmlspecialchars(strip_tags($username));
        $first_name=htmlspecialchars(strip_tags($first_name));
        $last_name=htmlspecialchars(strip_tags($last_name));
        $phone=htmlspecialchars(strip_tags($phone));
        $mail=htmlspecialchars(strip_tags($mail));


        $query->bindParam(":first_name", $first_name);
        $query->bindParam(":last_name", $last_name);
        $query->bindParam(":username", $username);
        $query->bindParam(":mail", $mail);
        $query->bindParam(":phone", $phone);
        $query->bindParam(":password", $password);
        $query->bindParam(":birthdate", $birthdate);


        if ($query->execute()){
            $connection = null;
            return true;
        }
        $connection = null;
        return false;
    }

    // Vérifie s'il y a bien un utilisateur existant
    function checkUser($credentials){
 
        // Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        
        // Préparation/execution de la requête
        $sql = 'SELECT * FROM "users" WHERE  username = :credentials OR mail = :credentials';
        $query = $connection->prepare($sql);
        $query->execute([
            ":credentials" => $credentials,
        ]);
        $query->execute();

        // var_dump($stmt);
        
        // Fetch le résultat de la requête
        $results = $query->fetch(PDO::FETCH_ASSOC);

        // Fermeture de la connection
        $connection = null;

        return $results;
    }
    //Selection l'utilisateur par rapport à son mail 
    function getUser($mail){

        //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

        $sql = 'SELECT * FROM "user" WHERE mail = :mail';
        $query = $connection->prepare($sql);
        $query->bindParam(":mail",$mail);

        $query->execute();

        // Fetch the results as an associative array
        $results = $query->fetch(PDO::FETCH_ASSOC);

        return $results;
    }

    function login($credentials) {
         //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

        $sql = 'SELECT * FROM "users" WHERE  username = :credentials OR mail = :credentials';
        $query = $connection->prepare($sql);
        $query->execute([
            ":credentials" => $credentials,
        ]);

        return $query;
    }
    //Supprime un utilisateur de la Base de données
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
        if ($result && !password_verify($password, $result["password"])) {
            //Mauvais  Mot De Passe
            return False;
            }
        //Requêtes SQL
        $query = 'DELETE FROM user WHERE mail = :mail ;';
        $query = $connection->prepare($query);
        $query->bindParam(":mail", $mail);
        if ($query->execute()) {
            // Update réussie
            return true;
        }
        
        }
    //modifie les infos de l'utilisateur
    function modifyUserData($username,$first_name, $last_name, $phone, $mail,$id) {
        //Connecter la BDD
        $db = new Database();

        //Ouverture de la connection
        $connection = $db->getConnection();

        //Requêtes SQL
            //Mise à jour des données suivant l'ID fourni 
        $update = 'UPDATE user SET username = :username, first_name = :first_name, last_name = :last_name , phone = :phone , mail = :mail WHERE id = :id';

        $query = $connection->prepare($update);
        //Binding 
        $query->bindParam(":username", $username);
        $query->bindParam(":first_name", $first_name);
        $query->bindParam(":last_name", $last_name);
        $query->bindParam(":phone", $phone);
        $query->bindParam(":mail", $mail);
        $query->bindParam(":id", $id);

        //Exécution de la Query
        if ($query->execute()) {
            // Update réussie
            return true;
        }
    }
    //Modifie Le mot de passe utilisateur
    function modifyUserPassword($mail,$oldPassword,$newPassword) {
        //Connecter la BDD
        $db = new Database();

        //Ouverture de la connection
        $connection = $db->getConnection();

        //Requêtes SQL
            //Vérification de l'identifiant unique 
        $check = 'SELECT password from user WHERE mail = :mail ;';
        $query = $connection->prepare($check);
        $query->bindParam(":mail", $mail);
        //On voit si l'Execute passe ou pas
        if (!$query->execute()){
            return false;
            }
        //On voit si les mots de passe sont les mêmes
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result && !password_verify($oldPassword, $result["password"])) {
            //Mauvais Vieux Mot De Passe
            return False;
            }
        //Requêtes SQL
        
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = 'UPDATE user SET password = :newPassword WHERE mail = :mail ;';
        $query = $connection->prepare($query);
        $query->bindParam(":mail", $mail);
        $query->bindParam(":newPassword", $newPassword);
        //Exécution de la Query
        if ($query->execute()) {
            // Update réussie
            return true;
        }
    }
    //Modifie les photos de bannière et profile de l'utilisateur
    function modifyUserPics($profile_icon, $profile_banner, $id) {
        //Connecter la BDD
        $db = new Database();

        //Ouverture de la connection
        $connection = $db->getConnection();

        //Requêtes SQL
            //Mise à jour des données suivant l'ID fourni 
        $update = 'UPDATE user SET profile_icon = :profile_icon , profile_banner = :profile_banner WHERE id = :id';

        $query = $connection->prepare($update);
        //Binding 
        $query->bindParam(":profile_icon", $profile_icon);
        $query->bindParam(":profile_banner", $profile_banner);
        $query->bindParam(":id", $id);

        //Exécution de la Query
        if ($query->execute()) {
            // Update réussie
            return true;
        }
    }
    
    // Désactive le compte de l'utilisateur
    function disablingProccess($mail,$password) {
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
        
        if ($result && !password_verify($password, $result["password"])) {
            //Mauvais  Mot De Passe
            return False;
            }
        //Requêtes SQL
        $query = 'UPDATE user SET is_activated = FALSE WHERE mail = :mail ;';
        $query = $connection->prepare($query);
        $query->bindParam(":mail", $mail);
        if ($query->execute()) {
            // Update réussie
            return true;
        }
            
    }
    //récupère les Last seen avec le nom des utilisateurs  
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

        return $lastSeen;
    }
    //Met à jour les infos d'un groupe
    function updateGroups($name,$groupId,$description,$private,$lastSent) {
        //Connecter la BDD
        $db = new Database();
   
        // Ouverture de la connection
        $connection = $db->getConnection();
   
        // Requêtes SQL
        $query = $connection->query("UPDATE groups SET name = :name, description = :description, private = :private , last_sent = :lastSent WHERE id = :groupId");
        $query->bindParam(":name", $name);
        $query->bindParam(":groupId", $groupId);
        $query->bindParam(":description", $description);
        $query->bindParam(":private", $private);
        $query->bindParam(":lastSent", $lastSent);

        //Execution de la Query
        $query->execute();
   
        // Fermeture de la connection
        $connection = null;
    }
    function deleteGroups($groupId) {
        //Connecter la BDD
        $db = new Database();
   
        // Ouverture de la connection
        $connection = $db->getConnection();
   
        // Requêtes SQL
        $query = $connection->query("DELETE FROM groups WHERE id = :groupId");
        $query->bindParam(":groupId", $groupId);

        //Execution de la Query
        $query->execute();
   
        // Fermeture de la connection
        $connection = null;
    }
    //Permets d'ajouter des groupes

    function addGroups($name,$description,$private,$last_sent) {
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query('INSERT INTO "groups" (name, description, private, last_sent) VALUES(:name, :description, :private, :last_sent);');
    
        $name=htmlspecialchars(strip_tags($name));
        $description=htmlspecialchars(strip_tags($description));
  
        $query->bindParam(":name", $name);
        $query->bindParam(":description", $description);
        $query->bindParam(":private", $private);
        $query->bindParam(":last_sent", $last_sent);
      
        if ($query->execute()){
            return true;
        }
      }
    //récupère les utilisateurs d'un groupe
    function getGroupUsers($groupId) {
        //  Connection à la la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("SELECT user_group.user_id FROM user_group WHERE user_group.groupId = :groupId");
        $request->bindParam(":groupId", $groupId);
        $request->execute();

        $users = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $users;
    }
    //récupère les utilisateurs et le contenu des MP
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
        
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $messages;

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
    //Permets de récupérer le nom d'utilisateur, l'id du poste de la personne qui lie, le timestamp d'un poste l'id du poste du "user"
    function getUsersPostsLikes($id)
    {
        //  Connection à la la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        // Requêtes SQL
        $request = $connection->prepare("SELECT user.username, users_posts_likes.user_id, users_posts_likes.post_id, post.post_type, post.timestamp, post.author_type FROM users_posts_likes INNER JOIN post ON users_post_likes.post_id = post.id INNER JOIN user ON user.id = author_id WHERE user.id = :id");
        $request->bindParam(":id", $id);
        $request->execute();

        $posts = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $posts;
    }
    
    //Permets de récupérer les amis selon leurs Ids
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
    // Change le status de l'utilisateur
    function updateLoginStatus($status,$id) {
        $db = new Database();
        $connection = $db->getConnection();

        $query = $connection->prepare('UPDATE "user" SET is_online = :loginStatus WHERE id = :id');
        $query->bindParam(':loginStatus', $status);
        $query->bindParam(':id', $id);
        if($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
