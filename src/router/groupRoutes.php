<?php

require_once 'src/controller/groupController.php';

// déclaration variable globale
global $split_url;

//cleaning de l'url en cas de méthode GET
$url_cleaner = explode('?', $split_url[2]);
$clean_url = $url_cleaner[0];

// router dans la catégorie user
switch ($clean_url) {
    case 'Create':
      //require la page profil
      require_once 'template/group/group_create.php';
      break;
    case 'List':
      //require la page signup
      require_once 'template/group/group_list.php';
      break;
    case 'Page':
      //require la page login
      require_once 'template/group/group_page.php';
      break;
    default :
      //    require la page erreur 404
      require_once 'template/404.php';
      break;
}