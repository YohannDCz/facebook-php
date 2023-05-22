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

    //  fonction pour créer un post, commentaire ou non
    function createPost($author_id, $author_type, $post_type, $timestamp, $content, $commented_post_id = null){

        //  Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
            //requête d'insertion dans la table post
        $request = $connection->prepare("INSERT INTO post (author_id, author_type, post_type, timestamp) VALUES (:author_id, :author_type, :post_type, :timestamp)");

        $request->bindParam(":author_id", $author_id);
        $request->bindParam(":author_type", $author_type);
        $request->bindParam(":post_type", $post_type);
        $request->bindParam(":timestamp", $timestamp);

        //  vérification du fonctionnement de la requête
        if (!($request->execute())) {
            return false;
        }

            //  requête pour récupérer l'ID du post créé  précedemment
        $request = $connection->prepare("SELECT id FROM post WHERE author_id = :author_id AND author_type = :author_type AND timestamp = :timestamp");
        
        $request->bindParam(":author_id", $author_id);
        $request->bindParam(":author_type", $author_type);
        $request->bindParam(":timestamp", $timestamp);

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

        //  id du post créé auparavant
        $post_id = $request->fetch(PDO::FETCH_ASSOC);

        // switch qui décide d'où mettre le contenu en fonction du type du post
        switch($post_type) {
            case "publication":
                if (createPublication($post_id, $content)) {
                    return true;
                }
                return false;
            case "commentary":
                if (createCommentary($post_id, $commented_post_id, $content)) {
                    return true;
                }
                return false;
            default :
                return false;
        }
    }

    // fonction pour créer un commentaire (et pas un post attention)
    function createCommentary($post_id, $commented_post_id, $content) {

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
    function createPublication($post_id, $content) {

        // Requêtes SQL
        $request = $connection->prepare("INSERT INTO publications (post_id, content) VALUES (:id, :post_id, :content)");
        $request->bindParam(":post_id", $post_id);
        $request->bindParam(":content", $content);

        if ($request->execute()) {
            return true;
        }
        return false;
    }
}