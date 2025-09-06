<?php
ini_set('display_errors', 1);
class Database {
    
    function getConnection () {
        
        // variables de connection à la bdd
        $host = getenv('DB_HOST') ?: 'localhost';
        $dbname = getenv('DB_NAME') ?: 'socialNetwork';
        $username = getenv('DB_USER') ?: 'postgres';
        $password = getenv('DB_PASSWORD') ?: '0000';
        $port = getenv('DB_PORT') ?: 5432;

        $connection = null;
        try {
            $connection = new PDO("pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Erreur de connexion:" . $exception->getMessage();
        }

        return $connection;
    }
}
