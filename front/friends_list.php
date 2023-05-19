<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/friends_list.css">

<div class="friends_list_container">

    <div class="friends_list_side_bar">
        <div class="group_settings_fil_arianne">
            <p><a href="index.php">Accueil</a></p>
            <p class="material-icons-round">chevron_right</p>
            <p>Amis</p>
        </div>
        <h3 style="white-space: nowrap;" class="friends_list_title">Amis</h3>

        <a href="#" class="settings_links filter_friends">
            <h4 class="settings_category">
                <span class="material-icons-outlined friends_list_icons">group</span>
                <span class="friends_list_icons">Tous les amis</span>
                <span class="friends_list_mobile">Amis</span>
            </h4>
        </a>

        <a href="#" class="settings_links filter_pending">
            <h4 class="settings_category">
                <span class="material-icons-outlined friends_list_icons">pending</span>
                <span class="friends_list_icons">Invitations reçues</span>
                <span class="friends_list_mobile">Reçues</span>
            </h4>
        </a>

        <a href="#" class="settings_links filter_add">
            <h4 class="settings_category">
                <span class="material-icons-outlined friends_list_icons">person_add</span>
                <span class="friends_list_icons">Invitations envoyées</span>
                <span class="friends_list_mobile">En attente</span>
            </h4>
        </a>


    </div>


    <div class="friends_list_main">

        <div class="container search_friends">

            <h3>Tous les amis</h3>

            <div class="invitation">
                <div class="invitation_pp_name">
                    <div class="invitation_pp_div">
                        <img src="img/ooo.png" alt="Photo de profil" class="invitation_pp">
                    </div>
                    <p class="name">Nom de l'utilisateur 1</p>
                </div>
                <div class="actions">
                    <button class="accept">Voir profil</button>
                    <button class="reject">Retirez de vos amis</button>
                </div>
            </div>

            <div class="invitation">
                <div class="invitation_pp_name">
                    <div class="invitation_pp_div">
                        <img src="img/ooo.png" alt="Photo de profil" class="invitation_pp">
                    </div>
                    <p class="name">Nom de l'utilisateur 1</p>
                </div>
                <div class="actions">
                    <button class="accept">Voir profil</button>
                    <button class="reject">Retirez de vos amis</button>
                </div>
            </div>

        </div>

        <div class="container search_pending">

            <h3>Invitations reçues</h3>

            <div class="invitation">
                <div class="invitation_pp_name">
                    <div class="invitation_pp_div">
                        <img src="img/ooo.png" alt="Photo de profil" class="invitation_pp">
                    </div>
                    <p class="name">Nom de l'utilisateur 1</p>
                </div>
                <div class="actions">
                    <button class="accept">Accepter</button>
                    <button class="reject">Refuser</button>
                </div>
            </div>

            <div class="invitation">
                <div class="invitation_pp_name">
                    <div class="invitation_pp_div">
                        <img src="img/ooo.png" alt="Photo de profil" class="invitation_pp">
                    </div>
                    <p class="name">Nom de l'utilisateur 1</p>
                </div>
                <div class="actions">
                    <button class="accept">Accepter</button>
                    <button class="reject">Refuser</button>
                </div>
            </div>

        </div>

        <div class="container search_add">

            <h3>Invitations envoyées</h3>

            <div class="invitation">
                <div class="invitation_pp_name">
                    <div class="invitation_pp_div">
                        <img src="img/ooo.png" alt="Photo de profil" class="invitation_pp">
                    </div>
                    <p class="name">Nom de l'utilisateur 1</p>
                </div>
                <div class="actions">
                    <button class="reject">Annuler l'invitation</button>
                </div>
            </div>

            <div class="invitation">
                <div class="invitation_pp_name">
                    <div class="invitation_pp_div">
                        <img src="img/ooo.png" alt="Photo de profil" class="invitation_pp">
                    </div>
                    <p class="name">Nom de l'utilisateur 1</p>
                </div>
                <div class="actions">
                    <button class="reject">Annuler l'invitation</button>
                </div>
            </div>

        </div>


    </div>


</div>

<script src="./scripts/script_friends_list.js"></script>
<?php include 'footer.php' ?>