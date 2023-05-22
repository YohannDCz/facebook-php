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
        $content = [];
        //Recensement des utilisateurs et de leurs données/messages
        while (($row = $query->fetch())) {
            $content = [
                "user_id"=> $row["user_id"],
                "post_id"=> $row["post_id"]
            ];
            $content[] = $Content;
        }
        $posts = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $posts;
    }
    function getPostsLikes($id)
    {
        //  Connection à la la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();
        // Requêtes SQL
        $request = $connection->prepare("SELECT * FROM users_posts_likes WHERE user_id = :id");
        $request->bindParam(":id", $id);
        $request->execute();

        $posts = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $posts;
    }
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
}