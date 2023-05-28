<?php

// require de tous les controllers
require_once 'src/controller/userController.php';
require_once 'src/controller/groupController.php';
require_once 'src/controller/pagesController.php';
require_once 'src/controller/postController.php';

//  déclaration variable globale
global $split_url;
global $host;

//cleaning de l'url en cas de méthode GET
$url_cleaner = explode('?', $split_url[2]);
$clean_url = $url_cleaner[0];

// routage 
switch ($clean_url) {
    case 'signUp':
        //  fonction d'inscription
        signup();
        header('Location:' . 'http://' . $host . '/home');
        break;
    case 'login':
        //fonction de login
        if(login()) {
            header('Location:' . 'http://' . $host . '/home');
        }   else {
            header('Location:' . 'http://' . $host . '/user/login');
        }
        break;
    case 'logout':
        //  fonction de logout
        logout();
        header('Location:' . 'http://' . $host . '/user/login');
        break;
    case 'createGroup':
        //  fonction de création de groupe
        createGroup();
        header('Location:' . 'http://' . $host . '/group/Page?name=');
        break;
    case 'createPage':
        //  fonction de création de groupe
        $page_name = addPage();
        header('Location:' . 'http://' . $host . '/page/page?name=' . $page_name);
        break;
    case 'changePageBanner':
        //  fonction de changement de bannière
        $page_name = changePageBanner();
        header('Location:' . 'http://' . $host . '/page/page?name=' . $page_name);
        break;
    case 'changePagePicture':
        //  fonction de changement de bannière
        $page_name = changePagePicture();
        header('Location:' . 'http://' . $host . '/page/page?name=' . $page_name);
        break;
    case 'createPublication':
        $page_name = addPublication();
        header('Location:' . 'http://' . $host . '/page/page?name=' . $page_name);
        break;
    default:
        header('Location:' . 'http://' . $host . '/home');
        break;
}