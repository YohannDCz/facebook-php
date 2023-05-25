<?php
global $host;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../template/styles/global.css">
    <link rel="stylesheet" href="../template/styles/header.css">
    <link rel="stylesheet" href="../template/styles/footer.css">
    <link rel="stylesheet" href="../template/styles/theme.css">
    <title>Social View</title>
</head>

<body class="chat_body light-theme">
    <header>
        <div class="headerleft">
            <div class="logo">
                <a href=<?= "http://" . $host . "/home" ?>>
                    <img class="logo" src="../template/img/blue_logo.png" alt="#">
                </a>
            </div>
            <div class="searchbar">
                <span class="material-icons-outlined search_icon md-40">search</span>
                <input name="searchbar" type="text" class="inputsearchbar" placeholder="Recherche...">
            </div>
        </div>

        <div class="icons">
            <a href=<?= "http://" . $host . "/user/friendsList" ?>><span class="material-icons-outlined md-40">group</span></a>
            <a href=<?= "http://" . $host . "/user/notifications" ?>><span class="material-icons-outlined md-40 ">notifications</span></a>
            <a href=<?= "http://" . $host . "/user/chat" ?>><span class="material-icons-outlined md-40 ">chat</span></a>
            <div class="profilepicture">
                <img src="../template/img/pp.png" id="image">
            </div>
            <ul id="menu" class="menu">
                <li><a href="<?= "http://" . $host . "/user/settings" ?>"><span class="material-icons-outlined">settings</span>Paramètres</a></li>
                <li><a href="../template/src/controller/userController.php"><span class="material-icons-outlined">logout</span>Déconnexion</a></li>
            </ul>
        </div>

    </header>

    <link rel="stylesheet" href="../template/styles/header_burger.css">
    <script src="../template/scripts/script_header.js"></script>