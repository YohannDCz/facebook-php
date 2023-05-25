<?php

require_once 'src/controller/pagesController.php';

// déclaration variable globale
global $split_url;
global $host;

//cleaning de l'url en cas de méthode GET
$url_cleaner = explode('?', $split_url[2]);
$clean_url = $url_cleaner[0];

// router dans la catégorie user
switch ($clean_url) {
    case 'pageList':
        //require la page page_list
        require_once 'template/page/page_list.php';
        break;
    case 'pageCreate':
        //  require la page de création de page
        require_once 'template/page/page_create.php';
        break;
    case 'page':
        //require l'affichage page
        require_once 'template/page/page_page.php';
        break;
    default :
        //  require la page d'erreur
        require_once 'template/404.php';
        break;
}