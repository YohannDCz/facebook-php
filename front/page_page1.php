<?php
    require_once('../src/model/Database.php');
    //  Connecter la BDD
    $db = new Database();
    // Ouverture de la connection
    $connection = $db->getConnection();
    // Requêtes SQL
    $name = null;

    if(isset($_GET['name'])) {
        $name = $_GET['name'];

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

    $sql = "SELECT * FROM \"post\" WHERE author_id = :id AND post_type = 1 AND author_type = 'pages' ORDER BY timestamp DESC";

    $query = $connection->prepare($sql);
    $query->bindParam(':id', $idPage);
    $query->execute();

    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    $postCount = count($posts);

    $idPost = null;
    $authorId = null;

    $descriptionPublication = null;
    $imagePublication = null;
    $postComCount = null;
    
    function Posts($post, $connection) {
        $idPost = null;
        function Publication($post, $connection) { 
            $idPost = $post["id"];
            $sql = 'SELECT * FROM "publications" WHERE post_id = :id';
            $query = $connection->prepare($sql);
            $query->bindParam(':id', $idPost);
            $query->execute();
            $publication = $query->fetch(PDO::FETCH_ASSOC);
            $json = $publication["content"];
            $jsondecode = json_decode($json);
            return [$jsondecode->description, $jsondecode->image];
        }
            $sql2 = "SELECT * FROM \"post\" WHERE id = :id AND post_type = 2 ORDER BY timestamp DESC";

            $query = $connection->prepare($sql2);
            $query->bindParam(':id', $idPost);
            $query->execute();

            $postsComs = $query->fetchAll(PDO::FETCH_ASSOC);
            $postComCount = count($postsComs);

        function Commentary($post, $connection) { 
            $idPostCom = $post["id"];
            $authorId = $post["author_id"];
            
            $sql = 'SELECT * FROM "commentary" WHERE post_id = :id';
            $query = $connection->prepare($sql);
            $query->bindParam(':id', $idPostCom);
            $query->execute();
            
            $commentary = $query->fetch(PDO::FETCH_ASSOC);
            $json = $commentary["content"];
            $jsondecode = json_decode($json);

            $sql = 'SELECT * FROM "user" WHERE id = :authorId';
            $query = $connection->prepare($sql);
            $query->bindParam(':authorId', $authorId);
            $query->execute();

            $author = $query->fetch(PDO::FETCH_ASSOC);
            $username = $author["username"];
            $profile_pic = $author["profile_icon"];
            return [$username, $profile_pic, $jsondecode->description];
        }    
        [$descriptionPub, $imagePub] = Publication($post, $connection);
        [$usernameCom, $profile_picCom, $descriptionCom] = Commentary($post, $connection);

        return [$descriptionPub, $imagePub, $usernameCom, $profile_picCom, $descriptionCom];
    }
    


    

    

?>
<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/profile.css">
<link rel="stylesheet" href="styles/publication.css">


<div class="banner">
    <img class="banner-img" src=<?= $bannerProfile ?>>
    <input type="submit" class="Submitbutton" value="Modifier le profil">
    <div class="page_info">
        <img class="profile-img" src=<?= $iconProfile ?>>
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
                    <img src="./img/pp2.png" class="box_photos_friend_picture">
                    <p>Pseudo</p>
                </div>

                <div class="friends-info">
                    <img src="./img/pp2.png" class="box_photos_friend_picture">
                    <p>Pseudo</p>
                </div>

                <div class="friends-info">
                    <img src="./img/pp2.png" class="box_photos_friend_picture">
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
                <?php foreach ($posts as $post) :
                    [$description, $image] = Posts($post, $connection); ?>
                    <?php if ($image !== ""): ?>
                        <img src="<?= $image ?>" class="box_photos_picture">
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="list_publications">

        <div class="profile_publication_post">
            <div class="profile_publication_div_flex">
                <div>
                    <img src="./img/pp.png" alt="profile_picture" class="group_friend_pp">
                </div>
                <div class="profile_publication_div_post">
                    <textarea class="publication_person_comment_input" maxlength="500" placeholder="Que voulez-vous dire ?" oninput="autoResize(this)"></textarea>
                </div>
            </div>

            <div class="group_preview_publication_image">
                <div class="group_preview_publication_sub">
                    <span class="material-icons">image</span>
                    <p>Photo</p>
                </div>

                <div class="group_preview_publication_sub">
                    <span class="material-icons">videocam</span>
                    <p>Vidéo</p>
                </div>

            </div>
        </div>

        <?php foreach ($posts as $post) :
            [$description, $image] = Publication($post, $connection); ?>
            <div class="publication">

                <div class="publication_info">
                    <div>
                        <img src=<?= $iconProfile ?> alt="" class="group_friend_pp">
                    </div>
                    <div>
                        <p><?= $name ?></p>
                    </div>
                </div>


                <p><?= $description ?></p>

                <div class="publication_list_images">
                    <?php if ($image !== ""): ?>
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

                    <!-- un commentaire -->

                    <?php foreach ($postsComs as $post):
                        [$usename, $image, $description] = Commentary($post, $connection) ?>
                    <div>
                        <div class="publication_comment">
                            <div class="publication_info">
                                <img src=<?= $image ?> alt="" class="group_friend_pp">
                            </div>

                            <div>
                                <div class="publication_person_comment">
                                    <p class="publication_name">Nom Prénom</p>
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

                                <div class="publication_person_view_answer">
                                    <span class="material-icons-round">subdirectory_arrow_right</span>
                                    <p>X réponses</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>


                    <!-- commentaire qui se répond a un autre-->
                    <div class="publication_comment">

                        <div class="publication_info">
                            <img src="./img/pp.png" alt="" class="group_friend_pp">
                        </div>

                        <div>
                            <div class="publication_person_comment">
                                <p class="publication_name">Nom Prénom</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus vel cum dolorum accusantium eius neque odio accusamus, quos sequi alias. Aliquid eligendi commodi harum provident cum voluptatibus vitae, officia blanditiis.</p>
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
                                <div class="publication_comment">
                                    <div class="publication_info">
                                        <img src="./img/pp.png" alt="" class="group_friend_pp">
                                    </div>

                                    <div>
                                        <div class="publication_person_comment">
                                            <p class="publication_name">Nom Prénom</p>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus vel cum dolorum accusantium eius neque odio accusamus, quos sequi alias. Aliquid eligendi commodi harum provident cum voluptatibus vitae, officia blanditiis.</p>
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
                            </div>

                        </div>
                    </div>
                    <!-- écrire un commentaire -->

                </div>

                <div>
                    <div class="publication_comment">
                        <div class="publication_info">
                            <img src="./img/pp.png" alt="" class="group_friend_pp">
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
                <img src="./img/pp2.png" alt="" class="box_friends_friend_pp">
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <span class="material-icons md-20">person_remove</span>
        </div>

        <div class="box_friends_friend">
            <div class="box_friends_pp_name">
                <img src="./img/pp2.png" alt="" class="box_friends_friend_pp">
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <span class="material-icons md-20">person_remove</span>
        </div>

        <div class="box_friends_friend">
            <div class="box_friends_pp_name">
                <img src="./img/pp2.png" alt="" class="box_friends_friend_pp">
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

        <img src="./img/pp2.png" alt="" class="box_photos_photo">
        <img src="./img/pp2.png" alt="" class="box_photos_photo">
        <img src="./img/pp2.png" alt="" class="box_photos_photo">
        <img src="./img/pp2.png" alt="" class="box_photos_photo">
        <img src="./img/pp2.png" alt="" class="box_photos_photo">

    </div>


</div>

<script src="./scripts/script_profile.js"></script>
<script src="./scripts/script.js"></script>

<?php
include 'footer.php'
?>