<?php 
$servername = "localhost";
$username = "root";
$password = "";
$usersquery = "select * FROM users";
$conn = new PDO("mysql:host=$servername;dbname=user_info", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($usersquery);
$stmt->execute();
$r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
foreach ($result as $row) {
    $pic = $row["profile_icon"];
    $firstName =$row["first_name"];
    $lastName =$row["last_name"];
    $email =$row["mail"];
    $phone = $row["phone"];
    $password = $row["password"];
    $profileBanner =$row["profile_banner"];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #banner {
            width: 200px;
        }
        #profile_pic {
            width: 200px;
        }
    </style>
</head>
<body>
    <p>
    <img id ="banner"src="<?=$profile_banner?>">
    <img id="profile_pic"src="<?=$pic?>"><br>
    <?=$first_name?><br>
    <?=$last_name?><br>
    <?=$email?><br>
    <?=$phone?><br>
    <?=$password?><br>
        
    </p>
    <a href="Modify.php">Modify</a>
    <a href="Delete.php">Delete Account</a>
    <a href="Disable.php">Disable / Enable Account</a>
    
</body>
</html>