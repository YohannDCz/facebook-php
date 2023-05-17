<?php
class Posts
{
    // fonction qui récupère tous les posts d'un utilisateur
    function getPosts($id)
    {
        //  Connection à la la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        // Requêtes SQL
        $request = $connection->prepare("SELECT * FROM post WHERE id = :id");
        $request->bindParam(":id", $id);
        $request->execute();

        $posts = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $posts;
    }
}