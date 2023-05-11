<?php 
require_once('User.php');
require_once('Database.php');
$db = new Database();
$db->getConnection();

$user = new User($db);

$user->$firstName = $_POST["firstName"];
$user->$lastName = $_POST["lastName"];
$user->$email = $_POST["email"];
$user->$profileIcon = $_POST["profilePicture"];
$user->$profileBanner = $_POST["profileBanner"];
$user->$phone = $_POST["phoneNumber"];
$user->$userName = $_POST["userName"];
$user->$password = password_hash($_POST['_password'], PASSWORD_DEFAULT);
$user->update_user();
header("location: index.php")
?>
