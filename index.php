<?php
ini_set('display_errors', 1);
// inclure les controllers nécessaires

// récupérer la méthode et l'URL de la requête
$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];

// sépare l'url en plusieurs sections pour le routage
$split_url = explode($url, '/');


//Router
switch($split_url[1]){
    // Route utilisateur de l'API
    case 'user':
        // require le controller user
        require_once './src/controller/userController.php';
        break;
    case 'page':
        //  require le controller page
        require_once './src/controller/pagesController.php';
        break;
    case 'group':
        //  require le controller group
        require_once './src/controller/groupController.php';
        break;
    case 'post':
        //  require le controller post
        require_once './src/controller/postController.php';
        break;
}

?>
