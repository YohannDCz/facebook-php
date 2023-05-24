<?php include '../components/header.php' ?>
<link rel="stylesheet" href="../styles/publication.css">
<link rel="stylesheet" href="../styles/profile.css">
<link rel="stylesheet" href="../styles/group_page.css">



<div class="group_banner">
    <img class="banner-img" src="../img/blue-texture-marble.png">

</div>

<div class="group_info">
    <h3>Nom du groupe</h3>
    <p class="accept group_invitation">Voir invitations</p>
    <!-- <input type="submit" class="Submitbutton" value="Modifier le profil"> -->
</div>

<div class="summary">
    <h3>
        <a class="summary-link profile_publication" href="#" data-target="box_main">Publications</a>
    </h3>

    <h3>
        <a class="summary-link profile_aboutus" href="#" data-target="box_aboutus">À propos</a>
    </h3>

    <h3>
        <a class="summary-link profile_friends" href="#" data-target="box_summary_friends">Membres</a>
    </h3>

    <h3>
        <a class="summary-link profile_photos" href="#" data-target="box_summary_photos">Photos</a>
    </h3>

    <h3>
        <a class="summary-link profile_invitations" href="#" data-target="box_summary_invitations">Invitations</a>
    </h3>
</div>

<div class="summary-content box_main box_group" id="box_main">

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
                    <span class="material-icons-outlined md-20">home_repair_service</span>
                    <p id="user-info-list">Travaille à X</p>
                </li>
                <li class="logo-info">
                    <span class="material-icons-outlined md-20">school</span>
                    <p id="user-info-list">À étudié(e) au lycée X</p>
                </li>
                <li class="logo-info">
                    <span class="material-icons-outlined md-20">favorite</span>
                    <p id="user-info-list">Célibataire</p>
                </li>
                <li class="logo-info">
                    <span class="material-icons-outlined md-20">mail</span>
                    <p id="user-info-list">machin@machin.fr</p>
                </li>
            </ul>
        </div>

        <div class="box_friends">
            <div class="box-title">
                <h2>Membres</h2>
                <a class="profile_friends_link" href="#">Tous les membres</a>
            </div>

            <div class="box-img">

                <div class="friends-info">
                    <div class="friends_info_pp">
                        <img src="../img/pp2.png" class="box_photos_friend_picture">
                    </div>
                    <p>Pseudo</p>
                </div>

                <div class="friends-info">
                    <div class="friends_info_pp">
                        <img src="../img/pp2.png" class="box_photos_friend_picture">
                    </div>
                    <p>Pseudo</p>
                </div>

                <div class="friends-info">
                    <div class="friends_info_pp">
                        <img src="../img/pp2.png" class="box_photos_friend_picture">
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
                <div class="friends_info_pp">
                    <img src="../img/pp2.png" class="box_photos_friend_picture">
                </div>
                <div class="friends_info_pp">
                    <img src="../img/pp2.png" class="box_photos_friend_picture">
                </div>
                <div class="friends_info_pp">
                    <img src="../img/pp2.png" class="box_photos_friend_picture">
                </div>
                <div class="friends_info_pp">
                    <img src="../img/pp2.png" class="box_photos_friend_picture">
                </div>
                <div class="friends_info_pp">
                    <img src="../img/pp2.png" class="box_photos_friend_picture">
                </div>

            </div>
        </div>
    </div>

    <div class="list_publications">

        <div class="profile_publication_post">
            <div class="profile_publication_div_flex">
                <div class="publication_pp_div">
                    <img src="../img/pp.png" alt="profile_picture">
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

        <div class="publication">

            <div class="publication_pp_edit">
                <div class="publication_info">
                    <div class="publication_pp_div">
                        <img src="../img/pp.png" alt="profile_picture">
                    </div>
                    <p>Nom Prénom</p>
                </div>
                <button class="modifyButton Submitbutton"><span class="material-icons-round">edit</span></button>
            </div>


            <p class="publication_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur accusamus, dolorum perferendis veniam libero sunt dolores aspernatur facilis ipsum consequuntur officiis sint suscipit! Aliquid ipsum doloribus eius ipsa, vitae cupiditate?</p>
            <div class="placenewText">
            </div>
            <div class="publication_list_images">
                <img src="../img/blue-texture-marble.png" alt="" class="publication_image">
                <img src="../img/blue-texture-marble.png" alt="" class="publication_image">
                <img src="../img/blue-texture-marble.png" alt="" class="publication_image">
                <img src="../img/blue-texture-marble.png" alt="" class="publication_image">
            </div>

            <div class="publication_post_info">
                <p class="publication_persons_like"><a href="#">X personnes ont aimés</a></p>
                <p class="publication_persons_comment"><a href="#">X commentaires</a></p>
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

                <div>
                    <div class="publication_comment">
                        <div class="publication_info">
                            <div class="publication_pp_div">
                                <img src="../img/pp.png" alt="profile_picture">
                            </div>
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

                            <div class="publication_person_view_answer">
                                <span class="material-icons-round">subdirectory_arrow_right</span>
                                <p>X réponses</p>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- commentaire qui se répond a un autre-->
                <div class="publication_comment">

                    <div class="publication_info">
                        <div class="publication_pp_div">
                            <img src="../img/pp.png" alt="profile_picture">
                        </div>
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
                                    <div class="publication_pp_div">
                                        <img src="../img/pp.png" alt="profile_picture">
                                    </div>
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
                                                <div class="publication_pp_div">
                                                    <img src="../img/pp.png" alt="profile_picture">
                                                </div>
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
                        </div>

                    </div>
                </div>

                <!-- écrire un commentaire -->

            </div>

            <div>
                <div class="publication_comment">
                    <div class="publication_info">
                        <div class="publication_pp_div">
                            <img src="../img/pp.png" alt="profile_picture">
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
        <!-- fin publication -->

    </div>

</div>

<a href="group_page.php" class="summary-content box_return">
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
                <span class="material-icons-outlined md-20">home_repair_service</span>
                <p id="user-info-list">Travaille à X</p>
            </div>
            <div class="box_aboutus_edits">
                <!-- <span class="material-icons-outlined md-20">public</span> -->
                <span class="material-icons-outlined md-20 profile_edit">edit</span>
                <!-- <span class="material-icons-outlined md-20">delete</span> -->
            </div>
        </div>

        <div class="profile_edit_form">
            <span class="material-icons-outlined md-20">home_repair_service</span>
            <form action="" method="POST" class="profile_edit_form_block">
                <input type="text" placeholder="Je travaille à..." class="inputText">
                <input type="submit" value="Mettre à jour" class="Submitbutton">
            </form>
        </div>

        <div class="box_aboutus_info">
            <div class="logo-info">
                <span class="material-icons-outlined md-20">school</span>
                <p id="user-info-list">À étudié(e) au lycée Machin truc</p>
            </div>
            <div class="box_aboutus_edits">
                <!-- <span class="material-icons-outlined md-20">public</span> -->
                <span class="material-icons-outlined md-20 profile_edit">edit</span>
                <!-- <span class="material-icons-outlined md-20">delete</span> -->
            </div>
        </div>

        <div class="profile_edit_form">
            <span class="material-icons-outlined md-20">school</span>
            <form action="" method="POST" class="profile_edit_form_block">
                <input type="text" placeholder="J'ai étudié à..." class="inputText">
                <input type="submit" value="Mettre à jour" class="Submitbutton">
            </form>
        </div>

        <div class="box_aboutus_info">
            <div class="logo-info">
                <span class="material-icons-outlined md-20">favorite</span>
                <p id="user-info-list">Célibataire</p>
            </div>
            <div class="box_aboutus_edits">
                <!-- <span class="material-icons-outlined md-20">public</span> -->
                <span class="material-icons-outlined md-20 profile_edit">edit</span>
                <!-- <span class="material-icons-outlined md-20">delete</span> -->
            </div>
        </div>

        <div class="profile_edit_form">
            <span class="material-icons-outlined md-20">favorite</span>
            <form action="" method="POST" class="profile_edit_form_block">
                <input type="text" placeholder="Je suis actuellement en..." class="inputText">
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
    </div>

</div>


<div class="summary-content box_summary_friends">

    <div class="box_friends_title">
        <h2>Membres</h2>
        <input type="text" name="" id="" placeholder="Rechercher un membre..." class="box_friends_research" maxlength="75">
    </div>

    <div class="box_friends_info">

        <div class="box_friends_friend">
            <div class="box_friends_pp_name">
                <img src="../img/pp2.png" alt="" class="box_friends_friend_pp">
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <span class="material-icons md-20">person_remove</span>
        </div>

        <div class="box_friends_friend">
            <div class="box_friends_pp_name">
                <img src="../img/pp2.png" alt="" class="box_friends_friend_pp">
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <span class="material-icons md-20">person_remove</span>
        </div>

        <div class="box_friends_friend">
            <div class="box_friends_pp_name">
                <img src="../img/pp2.png" alt="" class="box_friends_friend_pp">
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

        <img src="../img/pp2.png" alt="" class="box_photos_photo">
        <img src="../img/pp2.png" alt="" class="box_photos_photo">
        <img src="../img/pp2.png" alt="" class="box_photos_photo">
        <img src="../img/pp2.png" alt="" class="box_photos_photo">
        <img src="../img/pp2.png" alt="" class="box_photos_photo">

    </div>


</div>

<div class="summary-content box_summary_invitations">

    <div class="box_friends_title">
        <h2>Invitations</h2>
    </div>

    <div class="box_invitations_info">

        <div class="box_invitations">
            <div class="box_friends_pp_name">
                <img src="../img/pp2.png" alt="" class="box_friends_friend_pp">
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <div class="box_invitations_buttons">
                <p class="accept">Accepter</p>
                <p class="reject">Refuser</p>
            </div>
        </div>

        <div class="box_invitations">
            <div class="box_friends_pp_name">
                <img src="../img/pp2.png" alt="" class="box_friends_friend_pp">
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <div class="box_invitations_buttons">
                <p class="accept">Accepter</p>
                <p class="reject">Refuser</p>
            </div>
        </div>

        <div class="box_invitations">
            <div class="box_friends_pp_name">
                <img src="../img/pp2.png" alt="" class="box_friends_friend_pp">
                <div class="box_friends_name">
                    <p>Nom Prénom</p>
                </div>
            </div>
            <div class="box_invitations_buttons">
                <p class="accept">Accepter</p>
                <p class="reject">Refuser</p>
            </div>
        </div>

    </div>


</div>

<script src="../scripts/script_group.js"></script>
<script src="../scripts/script.js"></script>
<script src="../scripts/script_publication.js"></script>

<?php include '../components/footer.php' ?>