<?php 
require_once('Database.php');
require_once('User.php');

$db = new Database();
$db->getConnection();
$user = new User($db);
$user->$email = $_POST["email"];
$user->$_password = $_POST['_password'];
$user->delete_user();

header("location: index.php")
?>