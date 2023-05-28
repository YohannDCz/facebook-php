<?php
require_once('./src/model/Database.php');
require_once('./src/model/Post.php');
// require_once('../../src/controller/pagesController.php')
// Connecter la BDD
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

$posts = new Posts();

[$page, $idPage, $namePage, $iconProfile, $bannerProfile] = $posts->setPage($name, $connection);

$_SESSION['page_id'] = $idPage;

// $posts = null;


?>
<?php include './template/components/header.php' ?>
<link rel="stylesheet" href="../template/styles/profile.css">
<link rel="stylesheet" href="../template/styles/publication.css">

<div class="banner">
    <img class="banner-img" src=<?= $bannerProfile ?>>

    <p class="Submitbutton material-icons-outlined md-20" id="change_pp">photo_camera
    </p>
    <ul class="menu_change_pp" id="menu_change_pp">
        <li id="changePP">Changer votre photo de profil</li>
        <li id="changeBanner">Changer votre bannière</li>
    </ul>
    <form action=<?= "http://" . $host . "/functions/changePagePicture" ?> method="POST" id="changePPWindow">
        <input type="text" name="profile_picture_url" placeholder="URL de votre photo de profil..." class="amisinput">
        <input type="submit" value="Changer votre photo de profil" class="Submitbutton2">
    </form>

    <form action=<?= "http://" . $host . "/functions/changePageBanner" ?> method="POST" id="changeBannerWindow">
        <input type="text" name="profile_picture_url" placeholder="URL de votre image de bannière..." class="amisinput">
        <input type="submit" value="Changer votre image de bannière" class="Submitbutton2">
    </form>

    <div class="page_info">
        <div class="profile-img">
            <img src=<?= $iconProfile ?> alt="iconProfile">
        </div>
        <div class="profile-nom-prenom">
            <h3><span class="white_space"><?= $namePage ?></span></h3>
            <h4><span class="white_space">X posts</span></h4>
        </div>
    </div>
</div>

<?php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // echo "Session invité";
} else {
?>
    <form action="" method="POST" class="page_follow">
        <input type="submit" value="S'abonner à la page" class="Submitbutton">
    </form>

    <form action="" method="POST" class="page_follow">
        <input type="submit" value="Se désabonner" class="Submitbutton">
    </form>
<?php
}
?>


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

        <div class="box_info">
            <div class="box-title">
                <h2>Intro</h2>
            </div>
            <ul class="user-info">
                <li class="logo-info">
                    <span class="material-icons-outlined md-20">location_on</span>
                    <p id="user-info-list">Habite à X</p>
                </li>
                <li class="logo-info">
                    <span class="material-icons-outlined md-20">mail</span>
                    <p id="user-info-list">machin@machin.fr</p>
                </li>
            </ul>
        </div>

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

                <?php
                [$posts1, $postCount] = $posts->fetchPublication($idPage, $connection);
                foreach ($posts1 as $post) :
                    [$idPublication, $description, $image] = $posts->Publication($post, $connection); ?>
                    <?php if ($image !== "") : ?>
                        <img src="<?= $image ?>" class="box_photos_picture">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="list_publications">

        <?php
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            // echo "Session Invité";
        } else {
        ?>
            <div class="profile_publication_post">
                <div class="profile_publication_div_flex">
                    <div class="publication_pp_div">
                        <img src=<?= $iconProfile ?> alt="profile_picture">
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
        <?php
        }
        ?>

        <?php
        [$posts1, $postCount] = $posts->fetchPublication($idPage, $connection);
        foreach ($posts1 as $post) :
            [$idPublication, $description, $image, $usersPostsLikesCount, $count] = $posts->Publication($post, $connection); ?>
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
                    <p><?= $usersPostsLikesCount ?> personnes ont aimés</p>
                    <p><?= $count ?> commentaires</p>
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
                    <?php
                    [$postsComs, $postComCount] = $posts->fetchCommentary($idPublication, $connection);
                    foreach ($postsComs as $post) :
                        [$username, $profile_pic, $description, $idCommentaire, $timestamp] = $posts->Commentary($post, $connection);
                        if ($username) : ?>
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
                                            <p><?= $timestamp ?> h</p>
                                        </div>

                                        <div class="publication_comment_reaction">
                                            <span class="material-icons">thumb_up</span>
                                            <p>1000</p>
                                        </div>
                                    </div>


                                    <div>
                                        <?php [$postsComs2, $postComCount2] = $posts->fetchCommentary2($idCommentaire, $connection);
                                        foreach ($postsComs2 as $post) :
                                            [$username, $profile_pic, $description, $timestamp] = $posts->Commentary2($post, $connection); ?>
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
                                                            <p><?= $timestamp ?> h</p>
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
                <!-- <span class="material-icons-outlined md-20">public</span> -->
                <span class="material-icons-outlined md-20 profile_edit">edit</span>
                <!-- <span class="material-icons-outlined md-20">delete</span> -->
            </div>
        </div>

        <div class="profile_edit_form">
            <span class="material-icons-outlined md-20">location_on</span>
            <form action="" method="POST" class="profile_edit_form_block">
                <input type="text" placeholder="J'habite à..." class="inputText">
                <input type="submit" value="Mettre à jour" class="Submitbutton">
            </form>
        </div>


        <div class="box_aboutus_info">
            <div class="logo-info">
                <span class="material-icons-outlined md-20">mail</span>
                <p id="user-info-list">machin@machin.fr</p>
            </div>
            <div class="box_aboutus_edits">
                <!-- <span class="material-icons-outlined md-20">public</span> -->
                <span class="material-icons-outlined md-20 profile_edit">edit</span>
                <!-- <span class="material-icons-outlined md-20">delete</span> -->
            </div>
        </div>

        <div class="profile_edit_form">
            <span class="material-icons-outlined md-20">mail</span>
            <form action="" method="POST" class="profile_edit_form_block">
                <input type="text" placeholder="machin@machin.machin" class="inputText">
                <input type="submit" value="Mettre à jour" class="Submitbutton">
            </form>
        </div>

        <div>
            <button id="buttonDeleteGroup" class="Submitbutton desactivate">Supprimez la page</button>
        </div>

        <form id="divDeleteGroup" action="" method="POST">
            <p>Êtes vous sûr(e) de vouloir supprimer la page ?</p>
            <input type="submit" value="Supprimer" class="Submitbutton desactivate">
        </form>

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

<script src="../template/scripts/script_page.js"></script>
<script src="../template/scripts/script_profile.js"></script>
<script src="../template/scripts/script.js"></script>
<script src="../template/scripts/script_publication.js"></script>

<?php
include './template/components/footer.php'
?>