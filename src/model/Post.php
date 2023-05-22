<?php

//Inclusion du fichier pour la connexion a la BDD
require_once 'Database.php';

class Posts {
    function createCommentary($post_id, $commented_post_id, $content) {
        //  Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

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
}