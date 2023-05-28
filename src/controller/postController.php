<?php

require_once("src/model/Database.php");
require_once("src/model/Post.php");

//  fonction qui crée une publication
function addPublication() {
    $page_id = $_SESSION['page_id'];
    $author_type = 'page';
    $post_type = 'publication';

    $message = $_POST['publication_content'];
    $json_message = json_encode($message);
    
    $post = new Posts;

    $post_id = $post->createPost($page_id, $author_type, $post_type, $json_message);
    $page_name = getPageNameByPostId($post_id);

    return $page_name;
}


//  fonction pour poster un commentaire sur un autre post
function comment($paramaters) {
    //tâche
}