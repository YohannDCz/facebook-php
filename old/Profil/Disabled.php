<?php 
require_once('User.php');
require_once('Database.php');
$db = new Database();
$db->getConnection();
$user = new User($db);

$user->$email = $_POST["Email"];
$user->$_password = $_POST['_password'];

$user->Disable_user();

// header("location: index.php")
?>