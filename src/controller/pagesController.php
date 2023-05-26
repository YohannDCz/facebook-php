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
?>