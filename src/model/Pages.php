<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


class Pages {
    // une fonction qui montre la page d'un utilisateur
    function getPages($id){
        
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
        while (($row = $query->fetch())) {
            $content = [
                "id"=> $row["id"],
                "name"=> $row["name"],
                "profile_icon"=> $row["profile_icon"],
                "profile_banner"=> $row["profile_banner"],
            ];
            $content[] = $Content;
        }

        // Fermeture de la connection
        $connection = null;

        return $content;
    }
    //Permets de récupérer la page et les utilisateurs affiliés aux pages
    function GetUserPage($pageId,$userId){
        
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

        return $content;
    }
    //Permets de supprimer la page
    function deletePage($pageId) {
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

     return $content;
    }
    //Permets de mettre à jour la page
    function updatePage($pageId,$profile_icon,$profile_banner,$content) {
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

    function setPage($name, $connection) {
        $sql = 'SELECT * FROM "pages" WHERE name = :name';
        $query = $connection->prepare($sql);
        $query->bindParam(':name', $name);
        $query->execute();

        $pages = $query->fetchAll(PDO::FETCH_ASSOC);
        $page = null;
        $idPage = null;
        $namePage = null;
        $iconProfile = null;
        $bannerProfile = null;

        if (!empty($pages)) {
            $page = $pages[0];
            $idPage = $page["id"];
            $namePage = $page["name"];
            $iconProfile = $page["profile_icon"];
            $bannerProfile = $page["profile_banner"];
        }

        return [$page, $idPage, $namePage, $iconProfile, $bannerProfile];
    }

    function fetchPublication($idPage, $connection)
    {
        $sql = "SELECT * FROM \"post\" WHERE author_id = :id AND post_type = 1 AND author_type = 'pages' ORDER BY timestamp DESC";

        $query = $connection->prepare($sql);
        $query->bindParam(':id', $idPage);
        $query->execute();

        $publications = $query->fetchAll(PDO::FETCH_ASSOC);
        $publicationCount = count($publications);
        return [$publications, $publicationCount];
    }


    function Publication($post, $connection)
    {   
        $count = 0;
        $idPublication = $post["id"];

        $sql = 'SELECT * FROM "publications" WHERE post_id = :id';
        $query = $connection->prepare($sql);
        $query->bindParam(':id', $idPublication);
        $query->execute();

        $publication = $query->fetch(PDO::FETCH_ASSOC);
        $json = $publication["content"];
        $jsondecode = json_decode($json);

        $sql = 'SELECT * FROM "users_posts_likes" WHERE post_id = :id';
        $query = $connection->prepare($sql);
        $query->bindParam(':id', $idPublication);
        $query->execute();

        $usersPostsLikes = $query->fetchAll(PDO::FETCH_ASSOC);
        $usersPostsLikesCount = count($usersPostsLikes);

        $sql = 'SELECT * FROM "commentary" WHERE post_id = :id';

        $query = $connection->prepare($sql);
        $query->bindParam(':id', $idPublication);
        $query->execute();

        $commentaires = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($commentaires as $commentaire) {
            $idCommentaire = $commentaire["id"];
            $sql = 'SELECT * FROM "commentary" WHERE post_id = :id';

            $query = $connection->prepare($sql);
            $query->bindParam(':id', $idCommentaire);
            $query->execute();

            $sousCommentaires = $query->fetchAll(PDO::FETCH_ASSOC);

            $postComCount2 = count($sousCommentaires);
            $count += $postComCount2;
        }
        $postComCount = count($commentaires);

        $count += $postComCount;

        return [$idPublication, $jsondecode->description, $jsondecode->image, $usersPostsLikesCount, $count];
    }

    function fetchCommentary($idPublication, $connection)
    {

        $sql = 'SELECT * FROM "commentary" WHERE post_id = :id';

        $query = $connection->prepare($sql);
        $query->bindParam(':id', $idPublication);
        $query->execute();

        $commentaires = $query->fetchAll(PDO::FETCH_ASSOC);

        $postComCount = count($commentaires);
        return [$commentaires, $postComCount];
    }


    function Commentary($PostCommentaire, $connection)
    {   
        $idCommentaire = $PostCommentaire["id"];
        $json = $PostCommentaire["content"];
        $jsondecode = json_decode($json);


        $sql = 'SELECT * FROM "post" WHERE id = :id';
        $query = $connection->prepare($sql);
        $query->bindParam(':id', $idCommentaire);
        $query->execute();

        $stmt = $query->fetch(PDO::FETCH_ASSOC);
        $authorId = $stmt["author_id"];
        $timestamp = $stmt["timestamp"];
        $timestamp = substr($timestamp, 0, 16);

        $sql = 'SELECT * FROM "users" WHERE id = :authorId';
        $query = $connection->prepare($sql);
        $query->bindParam(':authorId', $authorId);
        $query->execute();

        $author = $query->fetch(PDO::FETCH_ASSOC);
        $username = $author["username"];
        $profile_pic = $author["profile_icon"];

        return [$username, $profile_pic, $jsondecode->description, $idCommentaire, $timestamp];
    }

    function fetchCommentary2($idCommentaire, $connection)
    {   
        $sql = 'SELECT * FROM "commentary" WHERE post_id = :id';

        $query = $connection->prepare($sql);
        $query->bindParam(':id', $idCommentaire);
        $query->execute();

        $sousCommentaires = $query->fetchAll(PDO::FETCH_ASSOC);

        $postComCount2 = count($sousCommentaires);
        return [$sousCommentaires, $postComCount2];
    }


    function Commentary2($sousCommentaire, $connection)
    {

        $idSousCommentaire = $sousCommentaire["id"];
        $json = $sousCommentaire["content"];
        $jsondecode = json_decode($json);

        $sql = 'SELECT * FROM "post" WHERE id = :id';
        $query = $connection->prepare($sql);
        $query->bindParam(':id', $idSousCommentaire);
        $query->execute();

        $stmt = $query->fetch(PDO::FETCH_ASSOC);
        $authorId = $stmt["author_id"];
        $timestamp = $stmt["timestamp"];
        $timestamp = substr($timestamp, 0, 16);

        $sql = 'SELECT * FROM "users" WHERE id = :authorId';
        $query = $connection->prepare($sql);
        $query->bindParam(':authorId', $authorId);
        $query->execute();

        $author = $query->fetch(PDO::FETCH_ASSOC);
        $username = $author["username"];
        $profile_pic = $author["profile_icon"];
        return [$username, $profile_pic, $jsondecode->description, $timestamp];
    }
}