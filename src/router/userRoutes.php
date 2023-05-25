<?php

require_once 'src\controller\userController.php';

// déclaration variable globale
global $split_url;
global $host;

//cleaning de l'url en cas de méthode GET
$url_cleaner = explode('?', $split_url[2]);
$clean_url = $url_cleaner[0];

// router dans la catégorie user
switch ($clean_url) {
    case 'profile':
      //require la page profil
      require_once 'template/user/profile.php';
      break;
    case 'signup':
      if ($condition) {
        signup();
        login();
        header('Location:' . $host . 'home');
      }
      //require la page signup
      require_once 'template/user/signup.php';
      break;
    case 'login':
      //require la page login
      require_once 'template/user/login.php';
      break;
    case 'mentions':
      //require la page mentions légale
      require_once 'template/user/mentions.php';
      break;
    case 'contactUs':
      // require la page contact_us
      require_once 'template/user/contact_us.php';
      break;
    case 'policy':
      //  require la page policy
      require_once 'template/user/policy.php';
      break;
    case 'friendsList':
      //  require la page friend_list
      require_once 'template/user/friends_list.php';
      break;
    case 'chat':
      //  require la page de chat
      require_once 'template/user/chat.php';
      break;
    case 'settings':
      //  require la page de paramètres
      require_once 'template/user/settings.php';
      break;
    case 'search':
      //require la page de recherche
      require_once 'template/user/search_page.php';
      break;
    case 'notifications':
      //require la page notifications
      require_once 'template/user/notifications_list.php';
      break;
      case 'aboutUs':
        //require la page notifications
        require_once 'template/user/about_us.php';
        break;
    default :
      //  require la page erreur 404;
      require_once 'template/404.php';
      break;
}