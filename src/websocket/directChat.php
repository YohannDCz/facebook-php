<?php
namespace MyApp;
use Database;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

//require_once "../model/Database.php";


class Chat implements MessageComponentInterface {

    public function connectDB() {

        //  Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        return $db->getConnection();

    }

    public function onOpen(ConnectionInterface $conn) {

        $connection = $this->connectDB();

        $request = $connection->prepare("UPDATE user SET is_online = true WHERE user.id = :id");

        $request->bindParam(":id", $_COOKIE["id"]);

        $request->execute();
    }


    public function onMessage(ConnectionInterface $from, $msg) {

        $connection = $this->connectDB();

        switch($_COOKIE["group"]){
            case true :
                // Request pour group message
                // récupérer le group_id les user_id et le contenu du message
                

            default :
                // Request pour message privé
        }

    }

    public function onClose(ConnectionInterface $conn) {

        $connection = $this->connectDB();

        $request = $connection->prepare("UPDATE user SET is_online = false WHERE user.id = :id");

        $request->bindParam(":id", $_COOKIE["id"]);

        $request->execute();

    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
    }
}