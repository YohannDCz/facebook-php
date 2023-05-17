<?php
class Groups
{
    // fonction qui récupère tous les groupes d'un utilisateur
    function getGroups($id)
    {
        //  Connection à la la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("SELECT * FROM groups WHERE groups.id IN ( SELECT user_group.group_id FROM user_group WHERE user_group.user_id = :id )");
        $request->bindParam(":id", $id);
        $request->execute();

        $groups = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $groups;
    }

    //  fonction qui récupère toutes les ids des utilisateurs d'un groupe
    function getGroupUsers($group_id) {
        //  Connection à la la BDD
        $db = new Database();

        // Ouverture de la connection
        $connection = $db->getConnection();

        // Requêtes SQL
        $request = $connection->prepare("SELECT user_group.user_id FROM user_group WHERE user_group.group_id = :group_id");
        $request->bindParam(":group_id", $group_id);
        $request->execute();

        $users = $request->fetchAll(PDO::FETCH_ASSOC);

        //  fermeture de la connexion
        $connection = null;
        return $users;
    }
}