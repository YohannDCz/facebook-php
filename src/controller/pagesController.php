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
