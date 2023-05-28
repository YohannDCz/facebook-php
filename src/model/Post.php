<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';


// modèle contenant les requêtes correspondant aux posts (commentaire et publications inclus)
class Posts {

    //  fonction pour effacer un post(et pas un commentaire ou une publication)
    function deletePost($post_id) {

        //  Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

        $request = $connection->prepare("DELETE FROM post WHERE id = :post_id");
        
        $request->bindParam(":post_id", $post_id);

        if ($request->execute()) {
            return true;
        }
        return false;
    }

    function getPageNameByPostId($post_id){
        //  Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        
        // Requêtes SQL
            //requête d'insertion dans la table post
        $request = $connection->prepare("SELECT  name FROM pages WHERE id = (SELECT author_id FROM post WHERE id = :id)");
        
        $request->bindParam(":id", $post_id);

        $request->execute();

        $page_name = $request->fetch(PDO::FETCH_ASSOC);

        return $page_name['name'];
    }

    //  fonction pour créer un post, commentaire ou non
    function createPost($author_id, $author_type, $post_type, $content, $commented_post_id = null){

        //  Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
            //requête d'insertion dans la table post
        $request = $connection->prepare("INSERT INTO post (author_id, author_type, post_type) VALUES (:author_id, :author_type, :post_type)");

        $request->bindParam(":author_id", $author_id);
        $request->bindParam(":author_type", $author_type);
        $request->bindParam(":post_type", $post_type);

        //  vérification du fonctionnement de la requête
        if (!($request->execute())) {
            return false;
        }

            //  requête pour récupérer l'ID du post créé  précedemment
        $request = $connection->prepare("SELECT id FROM post WHERE author_id = :author_id AND author_type = :author_type ORDER BY timestamp");
        
        $request->bindParam(":author_id", $author_id);
        $request->bindParam(":author_type", $author_type);

        //  vérification du fonctionnement de la requête
        if (!($request->execute())) {
            // si la requête précédente échoue, on efface le post crée précedemment avant de quitter la fonction
            $subrequest = $connection->prepare("DELETE FROM post WHERE id = :post_id");
        
            $subrequest->bindParam(":author_id", $author_id);
            $subrequest->bindParam(":author_type", $author_type);
            $subrequest->bindParam(":timestamp", $timestamp);

            $subrequest->execute();

            return false;
        }

        $connection = null ;

        //  id du post créé auparavant
        $post_id = $request->fetch(PDO::FETCH_ASSOC);

        // switch qui décide d'où mettre le contenu en fonction du type du post
        switch($post_type) {
            case "publication":
                if (createPublication($post_id, $content, $connection)) {
                    return $post_id;
                }
                return false;
            case "commentary":
                if (createCommentary($post_id, $commented_post_id, $content, $connection)) {
                    return $post_id;
                }
                return false;
            default :
                return false;
        }
    }

    // fonction pour créer un commentaire (et pas un post attention)
    function createCommentary($post_id, $commented_post_id, $content, $connection) {

        // Requêtes SQL
        $request = $connection->prepare("INSERT INTO commentary (id, post_id, content) VALUES (:id, :post_id, :content)");
        $request->bindParam(":id", $post_id);
        $request->bindParam(":post_id", $commented_post_id);
        $request->bindParam(":content", $content);

        if ($request->execute()) {
            return true;
        }
        return false;
    }

    //  fonction pour créer une publication (et pas un post attention)
    function createPublication($post_id, $content, $connection) {

        // Requêtes SQL
        $request = $connection->prepare("INSERT INTO publications (post_id, content) VALUES (:id, :post_id, :content)");
        $request->bindParam(":post_id", $post_id);
        $request->bindParam(":content", $content);

        if ($request->execute()) {
            return true;
        }
        return false;
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