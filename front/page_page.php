<?php
require_once('../src/model/Database.php');
//  Connecter la BDD
$db = new Database();
// Ouverture de la connection
$connection = $db->getConnection();
// Requêtes SQL
$name = null;

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    setcookie("name", $name);
} else {
    echo "Name parameter not provided!";
}

$sql = 'SELECT * FROM "pages" WHERE name = :name';
$query = $connection->prepare($sql);
$query->bindParam(':name', $name);
$query->execute();

$pages = $query->fetchAll(PDO::FETCH_ASSOC);
$page = null;
$idPage = null;
$namePage = null;
$iconProfile = null;
$bannerProfile = null;

if (!empty($pages)) {
    $page = $pages[0];
    $idPage = $page["id"];
    $namePage = $page["name"];
    $iconProfile = $page["profile_icon"];
    $bannerProfile = $page["profile_banner"];
}

$postCount = null;
$posts = null;

function fetchPublication($idPage, $connection)
{
    $sql = "SELECT * FROM \"post\" WHERE author_id = :id AND post_type = 1 AND author_type = 'pages' ORDER BY timestamp DESC";

    $query = $connection->prepare($sql);
    $query->bindParam(':id', $idPage);
    $query->execute();

    $publications = $query->fetchAll(PDO::FETCH_ASSOC);
    $publicationCount = count($publications);
    return [$publications, $publicationCount];
}


function Publication($post, $connection)
{
    $idPublication = $post["id"];

    $sql = 'SELECT * FROM "publications" WHERE post_id = :id';
    $query = $connection->prepare($sql);
    $query->bindParam(':id', $idPublication);
    $query->execute();

    $publication = $query->fetch(PDO::FETCH_ASSOC);
    $json = $publication["content"];
    $jsondecode = json_decode($json);
    return [$idPublication, $jsondecode->description, $jsondecode->image];
}

function fetchCommentary($idPublication, $connection)
{
    // $sql = "SELECT * FROM \"post\" WHERE post_type = 2 ORDER BY timestamp DESC";

    // $query = $connection->prepare($sql);
    // // $query->bindParam(':id', $idPublication);
    // $query->execute();

    // $PostsCommentaires = $query->fetchAll(PDO::FETCH_ASSOC);
    // // var_dump($PostsCommentaires);

    $sql = 'SELECT * FROM "commentary" WHERE post_id = :id';

    $query = $connection->prepare($sql);
    $query->bindParam(':id', $idPublication);
    $query->execute();

    $commentaires = $query->fetchAll(PDO::FETCH_ASSOC);

    $postComCount = count($commentaires);
    return [$commentaires, $postComCount];
}


function Commentary($PostCommentaire, $connection)
{   
    $idCommentaire = $PostCommentaire["id"];
    $json = $PostCommentaire["content"];
    $jsondecode = json_decode($json);

    // $authorId = $PostCommentaire["author_id"];
    // var_dump($authorId);

    $sql = 'SELECT * FROM "post" WHERE id = :id';
    $query = $connection->prepare($sql);
    $query->bindParam(':id', $idCommentaire);
    $query->execute();

    $stmt = $query->fetch(PDO::FETCH_ASSOC);
    $authorId = $stmt["author_id"];

    $sql = 'SELECT * FROM "users" WHERE id = :authorId';
    $query = $connection->prepare($sql);
    $query->bindParam(':authorId', $authorId);
    $query->execute();

    $author = $query->fetch(PDO::FETCH_ASSOC);
    $username = $author["username"];
    $profile_pic = $author["profile_icon"];
    return [$username, $profile_pic, $jsondecode->description, $idCommentaire];
}

function fetchCommentary2($idCommentaire, $connection)
{   
    $sql = 'SELECT * FROM "commentary" WHERE post_id = :id';

    $query = $connection->prepare($sql);
    $query->bindParam(':id', $idCommentaire);
    $query->execute();

    $sousCommentaires = $query->fetchAll(PDO::FETCH_ASSOC);

    $postComCount = count($sousCommentaires);
    return [$sousCommentaires, $postComCount];
}


function Commentary2($sousCommentaire, $connection)
{
    // $idPostSousCommentaire = $sousCommentaire["id"];

    // $authorId = $sousCommentaire["author_id"];

    // $sql = 'SELECT * FROM "commentary" WHERE id = :id';
    // $query = $connection->prepare($sql);
    // $query->bindParam(':id', $idPostSousCommentaire);
    // $query->execute();
    
    // $sousCommentaire = $query->fetch(PDO::FETCH_ASSOC);

    // if(!$sousCommentaire) {
    //     return null;
    // } 
    
    // $json = $sousCommentaire["content"];
    // $jsondecode = json_decode($json);

    // $sql = 'SELECT * FROM "users" WHERE id = :authorId';
    // $query = $connection->prepare($sql);
    // $query->bindParam(':authorId', $authorId);
    // $query->execute();

    // $author = $query->fetch(PDO::FETCH_ASSOC);
    // $username = $author["username"];
    // $profile_pic = $author["profile_icon"];
    // return [$username, $profile_pic, $jsondecode->description];

    $idSousCommentaire = $sousCommentaire["id"];
    $json = $sousCommentaire["content"];
    $jsondecode = json_decode($json);

    // $authorId = $sousCommentaire["author_id"];
    // var_dump($authorId);

    $sql = 'SELECT * FROM "post" WHERE id = :id';
    $query = $connection->prepare($sql);
    $query->bindParam(':id', $idSousCommentaire);
    $query->execute();

    $stmt = $query->fetch(PDO::FETCH_ASSOC);
    $authorId = $stmt["author_id"];

    $sql = 'SELECT * FROM "users" WHERE id = :authorId';
    $query = $connection->prepare($sql);
    $query->bindParam(':authorId', $authorId);
    $query->execute();

    $author = $query->fetch(PDO::FETCH_ASSOC);
    $username = $author["username"];
    $profile_pic = $author["profile_icon"];
    return [$username, $profile_pic, $jsondecode->description];
}

?>
<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/profile.css">
<link rel="stylesheet" href="styles/publication.css">


<div class="banner">
    <img class="banner-img" src=<?= $bannerProfile ?>>
    <input type="submit" class="Submitbutton" value="Modifier le profil">
    <div class="page_info">
        <div class="profile-img">
            <img src=<?= $iconProfile ?> alt="iconProfile">
        </div>
        <div class="profile-nom-prenom">
            <h3><span class="white_space"><?= $namePage ?></span></h3>
            <h4><span class="white_space"><?= $postCount ?> posts</span></h4>
        </div>
    </div>
</div>

<div class="summary">
    <h3>
        <a class="summary-link profile_publication" href="#" data-target="box_main">Publications</a>
    </h3>

    <h3>
        <a class="summary-link profile_aboutus" href="#" data-target="box_aboutus">À propos</a>
    </h3>

    <h3>
        <a class="summary-link profile_friends" href="#" data-target="box_summary_friends">Abonnés</a>
    </h3>

    <h3>
        <a class="summary-link profile_photos" href="#" data-target="box_summary_photos">Photos</a>
    </h3>
</div>

<div class="summary-content box_main" id="box_main">

    <div class="box_left">

        <div class="box_friends">
            <div class="box-title">
                <h2>Abonnés</h2>
                <a class="profile_friends_link" href="#">Tous les abonnés</a>
            </div>

            <div class="box-img">

                <div class="friends-info">
                    <div class="friends_info_pp">
                        <img src="./img/pp2.png" class="box_photos_friend_picture">
                    </div>
                    <p>Pseudo</p>
                </div>

                <div class="friends-info">
                    <div class="friends_info_pp">
                        <img src="./img/pp2.png" class="box_photos_friend_picture">
                    </div>
                    <p>Pseudo</p>
                </div>

                <div class="friends-info">
                    <div class="friends_info_pp">
                        <img src="./img/pp2.png" class="box_photos_friend_picture">
                    </div>
                    <p>Pseudo</p>
                </div>

            </div>

        </div>

        <div class="box_photos">
            <div class="box-title">
                <h2>Photos</h2>
                <a class="profile_photos_link" href="#">Toutes les photos</a>
            </div>
            <div class="box-img">

                <?php [$posts, $postCount] = fetchPublication($idPage, $connection);
                foreach ($posts as $post) :
                    [$description, $image] = Publication($post, $connection); ?>
                    <?php if ($image !== "") : ?>
                        <img src="<?= $image ?>" class="box_photos_picture">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="list_publications">

        <div class="profile_publication_post">
            <div class="profile_publication_div_flex">
                <div class="publication_pp_div">
                    <img src="./img/pp.png" alt="profile_picture">
                </div>
                <div class="profile_publication_div_post">
                    <textarea class="publication_person_comment_input" maxlength="500" placeholder="Que voulez-vous dire ?" oninput="autoResize(this)"></textarea>
                </div>
            </div>

            <div class="group_preview_publication_image">
                <label id="custom-img-btn">
                    <div class="group_preview_publication_sub">
                        <span class="material-icons">image</span>
                        <p>Photo</p>
                    </div>
                </label>

                <!-- <label id="custom-video-btn">
                    <div class="group_preview_publication_sub">
                        <span class="material-icons">videocam</span>
                        <p>Vidéo</p>
                    </div>
                </label> -->

                <div class="btn_send">
                    <a href="#" id="send"><span class="material-icons chat_send">send</span></a>
                </div>

            </div>

            <div id="publication_image">
                <button class="remove_btn"><span class="material-icons-round">close</span></button>
            </div>

        </div>

        <?php [$posts, $postCount] = fetchPublication($idPage, $connection);
        foreach ($posts as $post) :
            [$idPublication, $description, $image] = Publication($post, $connection); ?>
            <div class="publication">

                <div class="publication_info">
                    <div class="publication_pp_div">
                        <img src=<?= $iconProfile ?> alt="">
                    </div>
                    <div>
                        <p><?= $name ?></p>
                    </div>
                </div>


                <p><?= $description ?></p>

                <div class="publication_list_images">
                    <?php if ($image !== "") : ?>
                        <img src=<?= $image ?> alt="" class="publication_image">
                    <?php endif; ?>
                </div>

                <div class="publication_post_info">
                    <p>X personnes ont aimés</p>
                    <p>X commentaires</p>
                </div>

                <div class="publication_post_reaction">
                    <div class="group_preview_publication_sub">
                        <span class="material-icons">thumb_up</span>
                        <p>J'aime</p>
                    </div>
                    <div class="group_preview_publication_sub">
                        <span class="material-icons">add_comment</span>
                        <p>Commenter</p>
                    </div>
                    <div class="group_preview_publication_sub">
                        <span class="material-icons">send</span>
                        <p>Envoyer</p>
                    </div>
                </div>


                <div class="publication_list_comments">

                    <!-- commentaire qui se répond a un autre -->
                    <?php [$postsComs, $postComCount] = fetchCommentary($idPublication, $connection);
                    foreach ($postsComs as $post) :
                        [$username, $profile_pic, $description, $idCommentaire] = Commentary($post, $connection);
                        if ($username): ?>
                    <div class="publication_comment">

                        <div class="publication_info">
                            <div class="publication_pp_div">
                            <img src=<?= $profile_pic ?> alt="">
                        </div>
                    </div>

                        <div>
                            <div class="publication_person_comment">
                                <p class="publication_name"><?= $username ?></p>
                                <p><?= $description ?></p>
                            </div>

                            <div class="publication_person_comment_options_reaction">
                                <div class="publication_person_comment_options">
                                    <p>J'aime</p>
                                    <p>Répondre</p>
                                    <p>x h</p>
                                </div>

                                <div class="publication_comment_reaction">
                                    <span class="material-icons">thumb_up</span>
                                    <p>1000</p>
                                </div>
                            </div>


                            <div>
                                <?php [$postsComs2, $postComCount] = fetchCommentary2($idCommentaire, $connection);
                                foreach ($postsComs2 as $post):
                                    [$username, $profile_pic, $description] = Commentary2($post, $connection) ?>
                                <div class="publication_comment">
                                    <div class="publication_info">
                                        <div class="publication_pp_div">
                                            <img src=<?= $profile_pic ?> alt="">
                                        </div>
                                    </div>

                                    <div>
                                        <div class="publication_person_comment">
                                            <p class="publication_name"><?= $username ?></p>
                                            <p><?= $description ?></p>
                                        </div>

                                        <div class="publication_person_comment_options_reaction">
                                            <div class="publication_person_comment_options">
                                                <p>J'aime</p>
                                                <p>Répondre</p>
                                                <p>x h</p>
                                            </div>

                                            <div class="publication_comment_reaction">
                                                <span class="material-icons">thumb_up</span>
                                                <p>1000</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>

                        </div>
                    </div>
                    <?php endif ?>
                    <?php endforeach; ?>
                    <!-- écrire un commentaire -->
                </div>

                <div>
                    <div class="publication_comment">
                        <div class="publication_info">
                            <div class="publication_pp_div">
                                <img src="./img/pp.png" alt="">
                            </div>
                        </div>

                        <div class="publication_person_comment">

                            <textarea class="publication_person_comment_input" maxlength="300" placeholder="Ecrire un commentaire..." oninput="autoResize(this)"></textarea>
                            <div class="publication_person_emoji_react">
                                <div>
                                    <span class="material-icons-outlined">mood</span>
                                    <span class="material-icons-outlined">gif</span>
                                </div>
                                <span class="material-icons">send</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
        <!-- fin publication -->

    </div>

</div>

<a href="profile.php" class="summary-content box_return">
    <span class="material-icons-outlined material-icons-round return_icon">arrow_back</span>
    <p>Retour</p>
</a>

<div class="summary-content box_aboutus">

    <div class="box-title">
        <h2>À propos</h2>
    </div>

    <div class="user-info">

        <div class="box_aboutus_info">
            <div class="logo-info">
                <span class="material-icons-outlined md-20">location_on</span>
                <p id="user-info-list">Habite à X</p>
            </div>
            <div class="box_aboutus_edits">
                <span class="material-icons-outlined md-20">public</span>
                <span class="material-icons-outlined md-20">edit</span>
                <span class="material-icons-outlined md-20">delete</span>
            </div>
        </div>

        <div class="box_aboutus_info">
            <div class="logo-info">
                <span class="material-icons-outlined md-20">home_repair_service</span>
                <p id="user-info-list">Travaille à X</p>
            </div>
            <div class="box_aboutus_edits">
                <span class="material-icons-outlined md-20">public</span>
                <span class="material-icons-outlined md-20">edit</span>
                <span class="material-icons-outlined md-20">delete</span>
            </div>
        </div>

        <div class="box_aboutus_info">
            <div class="logo-info">
                <span class="material-icons-outlined md-20">school</span>
                <p id="user-info-list">À étudié(e) au lycée Machin truc</p>
            </div>
            <div class="box_aboutus_edits">
                <span class="material-icons-outlined md-20">public</span>
                <span class="material-icons-outlined md-20">edit</span>
                <span class="material-icons-outlined md-20">delete</span>
            </div>
        </div>

        <div class="box_aboutus_info">
            <div class="logo-info">
                <span class="material-icons-outlined md-20">favorite</span>
                <p id="user-info-list">Célibataire</p>
            </div>
            <div class="box_aboutus_edits">
                <span class="material-icons-outlined md-20">public</span>
                <span class="material-icons-outlined md-20">edit</span>
                <span class="material-icons-outlined md-20">delete</span>
            </div>
        </div>

        <div class="box_aboutus_info">
            <div class="logo-info">
                <span class="material-icons-outlined md-20">mail</span>
                <p id="user-info-list">machin@machin.fr</p>
            </div>
            <div class="box_aboutus_edits">
                <span class="material-icons-outlined md-20">public</span>
                <span class="material-icons-outlined md-20">edit</span>
                <span class="material-icons-outlined md-20">delete</span>
            </div>
        </div>
    </div>


</div>


<div class="summary-content box_summary_friends">

    <div class="box_friends_title">
        <h2>Abonnés</h2>
        <input type="text" name="" id="" placeholder="Rechercher un ami..." class="box_friends_research" maxlength="75">
    </div>

    <div class="box_friends_info">

        <div class="box_friends_friend">
            <div class="box_friends_pp_name">
                <div class="friends_info_pp">
                    <img src="./img/pp2.png" class="box_photos_friend_picture">
                </div>
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <span class="material-icons md-20">person_remove</span>
        </div>

        <div class="box_friends_friend">
            <div class="box_friends_pp_name">
                <div class="friends_info_pp">
                    <img src="./img/pp2.png" class="box_photos_friend_picture">
                </div>
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <span class="material-icons md-20">person_remove</span>
        </div>

        <div class="box_friends_friend">
            <div class="box_friends_pp_name">
                <div class="friends_info_pp">
                    <img src="./img/pp2.png" class="box_photos_friend_picture">
                </div>
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <span class="material-icons md-20">person_remove</span>
        </div>

    </div>


</div>


<div class="summary-content box_summary_photos">

    <div class="box-title">
        <h2>Photos</h2>
    </div>

    <div class="box_photos_all">

        <div class="friends_info_pp">
            <img src="./img/pp2.png" class="box_photos_friend_picture">
        </div>
        <div class="friends_info_pp">
            <img src="./img/pp2.png" class="box_photos_friend_picture">
        </div>
        <div class="friends_info_pp">
            <img src="./img/pp2.png" class="box_photos_friend_picture">
        </div>
        <div class="friends_info_pp">
            <img src="./img/pp2.png" class="box_photos_friend_picture">
        </div>
        <div class="friends_info_pp">
            <img src="./img/pp2.png" class="box_photos_friend_picture">
        </div>

    </div>


</div>

<script src="./scripts/script_profile.js"></script>
<script src="./scripts/script.js"></script>
<script src="./scripts/script_publication.js"></script>

<?php
include 'footer.php'
?>