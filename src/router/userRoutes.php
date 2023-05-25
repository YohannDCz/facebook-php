<?php

require_once 'src\controller\userController.php';

// déclaration variable globale
global $split_url;

// router dans la catégorie user
switch ($split_url[2]) {
    case 'profile':
      //require la page profil
      require_once 'template/user/profile.php';
      break;
    case 'signup':
      //require la page signup
      require_once '';
      break;
    case 'login':
      //require la page login
      require_once '';
      break;
    case 'mentions':
      //require la page mentions légale
      require_once '';
      break;
    default :
      echo 'DEFAULT USER PAGE';
      break;
}