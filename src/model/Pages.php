<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class Pages
{
    //  fonction qui retourne toutes les pages qui contiennent la recherche dans leur nom
    function getPagesByName($search)
    {
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        $query_string = '%' . $search . '%';

        //  Requêtes SQL
        $request = $connection->prepare("SELECT * FROM pages WHERE pages.name LIKE :search");
        $request->bindParam(":search", $query_string);

        $request->execute();

        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function fetchPage($connection)
    {

        //  Requêtes SQL
        $request = $connection->prepare("SELECT * FROM pages");

        $request->execute();

        $pages = $request->fetchAll(PDO::FETCH_ASSOC);

        return $pages;
    }

    function getPageName($page)
    {
        $name = $page["name"];

        return $name;
    }

    // une fonction qui montre la page d'un utilisateur
    function getPagesById($id)
    {

        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT * FROM pages WHERE id = :id ;");
        $query->bindParam(":id", $id);
        //Execution de la Query
        $query->execute();
        $content = [];
        //Recensement des utilisateurs et de leurs données/messages
        while (($row = $query->fetch(PDO::FETCH_ASSOC))) {
            $content = [
                "id" => $row["id"],
                "name" => $row["name"],
                "profile_icon" => $row["profile_icon"],
                "profile_banner" => $row["profile_banner"],
            ];
            // $content[] = $Content;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
    //Permets de récupérer la page et les utilisateurs affiliés aux pages
    function GetUserPage($pageId, $userId)
    {

        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("SELECT user.first_name, user.last_name, user.username, pages.profile_icon, pages.profile_banner, pages.name FROM pages INNER JOIN users_page ON pages.id = users_page.page_id INNER JOIN user ON users_pages.user_id = user.id  WHERE user.user_id = :userId and page.pageId = :pageId;");
        $query->bindParam(":userId", $userId);
        $query->bindParam(":pageId", $pageId);
        //Execution de la Query
        $query->execute();

        // Fermeture de la connection
        $connection = null;

        return $query;
    }
    //Permets de supprimer la page
    function deletePage($pageId)
    {
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("DELETE FROM pages WHERE id = :pageId ;");
        $query->bindParam(":pageId", $pageId);
        //Execution de la Query
        $query->execute();

        // Fermeture de la connection
        $connection = null;

        return $query;
    }
    //Permets de mettre à jour la page
    function updatePage($pageId, $profile_icon, $profile_banner, $content)
    {
        //Connecter la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $query = $connection->query("UPDATE pages SET name = :name, profile_icon = :profile_icon, profile_banner = :profile_banner , content = :content WHERE id = :pageId");
        $query->bindParam(":pageId", $pageId);
        $query->bindParam(":profile_icon", $profile_icon);
        $query->bindParam(":profile_banner", $profile_banner);
        $query->bindParam(":content", $content);
        //Execution de la Query
        $query->execute();

        // Fermeture de la connection
        $connection = null;

        return $content;
    }

    //  fonction de création de page
    function createPage($page_name, $profile_icon, $profile_banner, $content) {
        //Connecter la BDD
        $db = new Database();
        
        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("INSERT INTO pages (name, profile_icon, profile_banner, content) VALUES (:page_name, :profile_icon, :profile_banner, :content)");
        $request->bindParam(":page_name", $page_name);
        $request->bindParam(":profile_icon", $profile_icon);
        $request->bindParam(":profile_banner", $profile_banner);
        $request->bindParam(":content", $content);

        //Execution de la Query
        $request->execute();

        // Fermeture de la connection
        $connection = null;

        return $page_name;
    }

    function getPageById($id){
        //Connecter la BDD
        $db = new Database();
  
        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("SELECT * FROM pages WHERE id = :id");
        $request->bindParam(":id", $id);

        //Execution de la Query
        $request->execute();

        // Fermeture de la connection
        $connection = null;
        
        $result = $request->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    //  fonction pour modifier le chemin vers la photo de profil d'une page
    function    updateProfileIconPath($id, $picture_url){
         //Connecter la BDD
         $db = new Database();
   
         // Ouverture de la connection
         $connection = $db->getConnection();
 
         // Requêtes SQL
         $request = $connection->prepare("UPDATE pages SET profile_icon = :picture_path WHERE id = :id");
         $request->bindParam(":picture_path", $picture_url);
         $request->bindParam(":id", $id);    
         
        //Execution de la Query
        $request->execute();

        // Fermeture de la connection
        $connection = null;
        
        $page = new Pages;

        $result = $page->getPageById($id);

        return $result["name"];
    }

    //  fonction pour modifier le chemin vers l'image de la bannière d'une page
    function    updateProfileBannerPath($id, $banner_url){
        //Connecter la BDD
        $db = new Database();
  
        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("UPDATE pages SET profile_banner = :picture_path WHERE id = :id");
        $request->bindParam(":picture_path", $banner_url);
        $request->bindParam(":id", $id);    
        
        //Execution de la Query
        $request->execute();

        // Fermeture de la connection
        $connection = null;

        $page = new Pages;

        $result = $page->getPageById($id);

        return $result["name"];
    }

    //  fonction qui vérifie le role d'un utilisateur vis à vis d'une page
    function checkUserRole($user_mail, $page_id){
        //Connecter la BDD
        $db = new Database();
  
        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("SELECT id FROM users WHERE mail = :mail");
        $request->bindParam(":mail", $user_mail); 

        //Execution de la Query
        $request->execute();

        $requestData = $request->fetch(PDO::FETCH_ASSOC);
        $user_id = $requestData['id'];

        $request = $connection->prepare("SELECT role FROM users_page WHERE user_id = :user_id AND page_id = :page_id");

        $request->bindParam(":user_id", $user_id); 
        $request->bindParam(":page_id", $page_id); 

        //Execution de la Query
        $request->execute();

        // Fermeture de la connection
        $connection = null;

        $result = $request->fetch(PDO::FETCH_ASSOC);

        if ($result['role']) {
            return $result;
        }
        return null;
    }


}