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

    $page = new Pages;

    $page_name = createPage($_POST["page_name"], $_POST["page_profile_icon"], $_POST["page_profile_banner"], $_POST["content"]);

    return $page_name;
}
?>