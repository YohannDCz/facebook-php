<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/theme.css">
    <title>Social View</title>
</head>

<body class="chat_body light-theme">
    <header>
        <div class="headerleft">
            <div class="logo">
                <a href="index.php">
                    <img class="logo" src="img/blue_logo.png" alt="#">
                </a>
            </div>
            <div class="searchbar">
                <span class="material-icons-outlined search_icon md-40">search</span>
                <input name="searchbar" type="text" class="inputsearchbar" placeholder="Recherche...">
            </div>
        </div>

        <div class="icons">
            <a href="friends_list.php"><span class="material-icons-outlined md-40">group</span></a>
            <a href="notifications_list.php"><span class="material-icons-outlined md-40 ">notifications</span></a>
            <a href="chat.php"><span class="material-icons-outlined md-40 ">chat</span></a>
            <img class="profilepicture" src="img/pp.png" id="image">
            <ul id="menu" class="menu">
                <li><a href="settings.php"><span class="material-icons-outlined">settings</span>Paramètres</a></li>
                <li><a href="../src/controller/userController.php"><span class="material-icons-outlined">logout</span>Déconnexion</a></li>
            </ul>
        </div>

    </header>

    <link rel="stylesheet" href="./styles/header_burger.css">
    <script src="./scripts/script_header.js"></script>