<?php
ini_set('display_errors', 1);
// inclure les controllers nécessaires

// récupérer la méthode et l'URL de la requête
$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

//  host
$host = 'localhost:3000';

// sépare l'url en plusieurs sections pour le routage
$split_url = explode('/', $url);

//Router
switch($split_url[1]){
    // Route utilisateur de l'API
    case 'user':
        // require le controller user
        require_once './src/router/userRoutes.php';
        break;
    case 'page':
        //  require le controller page
        require_once './src/controller/pagesRoutes.php';
        break;
    case 'group':
        //  require le controller group
        require_once './src/controller/groupRoutes.php';
        break;
    case 'post':
        //  require le controller post
        require_once './src/controller/postRoutes.php';
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
