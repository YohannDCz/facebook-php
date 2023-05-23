<?php
namespace MyApp;
use Database;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {

        $connection = $this->connectDB();

        $request = $connection->prepare("UPDATE user SET is_online = true WHERE user.id = :id");

        $request->bindParam(":id", $_COOKIE["id"]);

        $request->execute();
    }


    public function onMessage(ConnectionInterface $from, $msg) {
    }

    public function onClose(ConnectionInterface $conn) {
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
    }
}