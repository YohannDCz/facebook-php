<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/group_create.css">

<div class="group_container">

    <div class="group_settings">
        <div class="group_settings_fil_arianne">
            <p><a href="group_list.php">Groupes</a></p>
            <p class="material-icons-round">chevron_right</p>
            <p>Créer un groupe</p>
        </div>

        <h3 style="white-space: nowrap;">Créer un groupe</h3>

        <div class="group_owner">
            <div>
                <img src="./img/pp.png" alt="pp" class="group_owner_pp">
            </div>
            <div class="group_owner_info">
                <p>Pseudo</p>
                <p class="group_owner_role">Admin</p>
            </div>
        </div>

        <form action="" class="group_form">

            <input type="text" name="" id="" placeholder="Nom du groupe (obligatoire)" class="group_input" maxlength="75" required>


            <select name="confidentiality" id="confidentiality" class="group_input">
                <option value="" disabled selected hidden>Confidentialité du groupe</option>
                <option value="group_public">Public</option>
                <option value="group_private">Privé</option>
            </select>

            <input type="text" name="" id="searchInput" placeholder="Inviter des amis (facultatif)" class="group_input">
            <div id="searchResults"></div>

            <input type="submit" value="Créer le groupe" class="Submitbutton">

        </form>

    </div>


    <div class="group_preview">
        <p class="group_text_preview">
            Aperçu du groupe
        </p>

        <div class="group_banner">
            <div class="group_banner_add_banner">
                <span class="material-icons">add_a_photo</span>
            </div>
        </div>

        <h1>Nom du groupe</h1>

        <div class="group_preview_info">
            <p class="group_preview_info_text">Confidentialité</p>
            <p class="group_preview_info_text">X Membres</p>
        </div>

        <div class="group_preview_titre">
            <h4>À propos</h4>
            <h4>Publications</h4>
            <h4>Membres</h4>
        </div>


        <div class="group_preview_main">
            <div class="group_preview_publication_main">
                <div class="group_preview_publication">
                    <div>
                        <img src="./img/pp.png" alt="profile_picture" class="group_friend_pp">
                    </div>
                    <div class="group_preview_publication_input">Que souhaitez-vous dire au groupe ?</div>
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

            <div class="group_preview_aboutus">
                <h4>À propos</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rerum officia illum vel praesentium rem ipsam, cumque fugiat! Ut minus, dolore a perspiciatis molestias similique illum provident aut officiis sapiente!</p>
            </div>


        </div>

    </div>
</div>

<script src="./scripts/script_group_create.js"></script>
<?php include 'footer.php' ?>