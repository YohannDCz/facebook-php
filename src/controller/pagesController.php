<?php

require_once("src/model/Database.php");
require_once("src/model/Pages.php");

//  fonction qui retourne toutes les pages qui commencent avec la recherche
function searchPagesByName() {

    $search = $_GET["searchPageName"];

    $page = new Pages;

    $result = $page->getPagesByName($search);

    return $result;
}

//  fonction pour créer une page
function addPage() {

    $page = new Pages();

    // $page_name = $page->createPage($_POST["page_name"], $_POST["page_profile_icon"], $_POST["page_profile_banner"], $_POST["content"]);
    $page_name = $page->createPage(
        isset($_POST["page_name"]) ? $_POST["page_name"] : null,
        isset($_POST["page_profile_icon"]) ? $_POST["page_profile_icon"] : null,
        isset($_POST["page_profile_banner"]) ? $_POST["page_profile_banner"] : null,
        isset($_POST["content"]) ? $_POST["content"] : null
    );
    
    return $page_name;
}

//  fonction pour modifier le chemin de l'image de profil
function changePagePicture(){
    $page_id = $_SESSION["page_id"];
    $new_picture_url = $_POST["profile_picture_url"];

    $page = new Pages;

    $result = $page->updateProfileIconPath($page_id, $new_picture_url);

    return $result;
}

//  fonction pour changer la bannière de la page, renvoie le nom de la page concéernée
function changePageBanner(){
    $page_id = $_SESSION["page_id"];
    $new_picture_url = $_POST["profile_banner_url"];

    $page = new Pages;

    $result = $page->updateProfileBannerPath($page_id, $new_picture_url);

    return $result;
}

//  fonction qui vérifie sir l'utilisateur est administrateur de la page
function getUserRole(){

    $user_mail = $_SESSION["email"];
    $page_id = $_SESSION["page_id"];

    $page = new Pages;

    $user_role = $page->checkUserRole($user_mail, $page_id);

    return $user_role;
}

//  fonction pour envoyer un message sur un groupe
function sendMessage(){
    
}
?>
