<?php
ini_set('display_errors', 1);
// inclure les routers nécessaires

// récupérer la méthode et l'URL de la requête
$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];
// sépare l'url en plusieurs sections pour le routage
$split_url = explode('/', $url);

//  démarrage session
session_start();

//Router
switch($split_url[1]){
    // Route utilisateur de l'API
    case 'user':
        // require le router user
        require_once './src/router/userRoutes.php';
        break;
    case 'page':
        //  require le router page
        require_once './src/router/pagesRoutes.php';
        break;
    case 'group':
        //  require le router group
        require_once './src/router/groupRoutes.php';
        break;
    case 'post':
        //  require le router post
        require_once './src/router/postRoutes.php';
        break;
    case 'functions':
        //  require le routeur des fonctions
        require_once './src/router/functionsRoutes.php';
        break;
    case 'home' :
        //require la page homepage
        require_once './template/user/homepage.php';
        break;
    default :
        //require la page d'erreur 404
        require_once './template/404.php';
        break;
}

?>
