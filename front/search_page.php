<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/search_page.css">

<div class="search_page_container">

<div class="search_input_div">
    <input type="text" class="search_input" value="Recherche...">
</div>

    <div class="search_page_sidebar">
        <h3>Résultat de la<br>recherche</h3>

        <a href="#" class="settings_links search_filter_all">
            <h4 class="settings_category">
                <span class="material-icons">person</span>
                Tous
            </h4>
        </a>

        <a href="#" class="settings_links search_filter_persons">
            <h4 class="settings_category">
                <span class="material-icons">person</span>
                Personnes
            </h4>
        </a>
    

        <a href="#" class="settings_links search_filter_groups">
            <h4 class="settings_category">
                <span class="material-icons">groups</span>
                Groupes
            </h4>
        </a>

        <a href="#" class="settings_links search_filter_pages">
            <h4 class="settings_category">
                <span class="material-icons">newspaper</span>
                Pages
            </h4>
        </a>


    </div>

    <div class="search_page_result">

        <div class="search_page_persons search_persons">

            <h3>Personnes</h3>

            <div class="person">
                <div class="search_pp_name">
                    <img class="photo" src="img/pp.png" alt="Photo 1">
                    <div class="person-info">
                        <p class="name">Nom Prénom</p>
                        <p>Travail 1</p>
                        <p>Ville 1</p>
                    </div>
                </div>
                <div class="search_button_div">
                    <p><a href="chat.php" class="research_button">Message</a></p>
                    <p><a href="profile.php" class="research_button">Voir profil</a></p>
                </div>
            </div>

            <div class="person">
                <div class="search_pp_name">
                    <img class="photo" src="img/pp.png" alt="Photo 1">
                    <div class="person-info">
                        <p class="name">Nom Prénom</p>
                        <p>Travail 1</p>
                        <p>Ville 1</p>
                    </div>
                </div>
                <div class="search_button_div">
                    <p><a href="chat.php" class="research_button">Ajouter en ami(e)</a></p>
                    <p><a href="profile.php" class="research_button">Voir profil</a></p>
                </div>
            </div>

        </div>

        <div class="search_page_persons search_groups">

            <h3>Groupes</h3>

            <div class="person">
                <div class="search_pp_name">
                    <img class="photo" src="img/pp.png" alt="Photo 1">
                    <div class="person-info">
                        <p class="name">Nom du groupe</p>
                        <p>Public</p>
                        <p>X Membres</p>
                    </div>
                </div>
                <div class="search_button_div">
                    <p><a href="profile.php" class="research_button">Voir groupe</a></p>
                </div>
            </div>

            <div class="person">
                <div class="search_pp_name">
                    <img class="photo" src="img/pp.png" alt="Photo 1">
                    <div class="person-info">
                        <p class="name">Nom du groupe</p>
                        <p>Privé</p>
                        <p>X Membres</p>
                    </div>
                </div>
                <div class="search_button_div">
                    <p><a href="#" class="research_button">Rejoindre</a></p>
                    <p><a href="profile.php" class="research_button">Voir groupe</a></p>
                </div>
            </div>

        </div>

        <div class="search_page_persons search_pages">

            <h3>Pages</h3>

            <div class="person">
                <div class="search_pp_name">
                    <img class="photo" src="img/pp.png" alt="Photo 1">
                    <div class="person-info">
                        <p class="name">Nom du groupe</p>
                        <p>Catégorie</p>
                        <p>X Followers</p>
                    </div>
                </div>
                <div class="search_button_div">
                    <p><a href="profile.php" class="research_button">Voir page</a></p>
                </div>
            </div>

            <div class="person">
                <div class="search_pp_name">
                    <img class="photo" src="img/pp.png" alt="Photo 1">
                    <div class="person-info">
                        <p class="name">Nom du groupe</p>
                        <p>Catégorie</p>
                        <p>X Followers</p>
                    </div>
                </div>
                <div class="search_button_div">
                    <p><a href="#" class="research_button">Suivre</a></p>
                    <p><a href="profile.php" class="research_button">Voir page</a></p>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="./scripts/script_search_page.js"></script>
<?php include 'footer.php' ?>