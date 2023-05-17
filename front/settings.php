<?php
function affichage()
{
    echo '<style>
        @media (max-width: 1024px) {
        .settings_block { display: flex; } 
        .Parameter { display: none; }
        }
        </style>';
}

function affichageParametre()
{
    echo '<style>
        @media (max-width: 1024px) {
        .Parameter { display: flex; }
        }
        </style>';
    affichageConfidentialite();
}

function affichageConfidentialite()
{
?>
    <h3>Raccourci de confidentialité</h3>
    <div class="settings_info">

        <div>
            <h4>Gérer votre profil</h4>
            <p>Accédez à votre profil pour modifier vos informations de confidentialité, par exemple qui peut voir votre date d’anniversaire ou vos relations.</p>
        </div>

        <div>
            <h4>Votre activité</h4>
            <div class="settings_info2">

                <div class="settings_info3 hover-icon">
                    <p class="settings_p">Qui peut voir vos publications</p>
                    <p class="settings_acces">Tout le monde</p>
                    <p class="settings_edit_icon"><span class="material-icons-outlined hide_icon">edit</span><span>Modifier</span></p>
                </div>

                <div class="settings_info3 hover-icon">
                    <p class="settings_p">Qui peut voir les personnes, Pages et listes que vous suivez ?</p>
                    <p class="settings_acces">Tout le monde</p>
                    <p class="settings_edit_icon"><span class="material-icons-outlined hide_icon">edit</span><span>Modifier</span></p>

                </div>

            </div>
        </div>


        <div>
            <h4>Comment les autres peuvent vous trouver et vous contacter</h4>
            <div class="settings_info2">

                <div class="settings_info3 hover-icon">
                    <p class="settings_p">Qui peut vous envoyer des invitations ?</p>
                    <p class="settings_acces">Tout le monde</p>
                    <p class="settings_edit_icon"><span class="material-icons-outlined hide_icon">edit</span><span>Modifier</span></p>
                </div>

                <div class="settings_info3 hover-icon">
                    <p class="settings_p">Qui peut voir votre liste d’amis ?</p>
                    <p class="settings_acces">Amis et leurs amis</p>
                    <p class="settings_edit_icon"><span class="material-icons-outlined hide_icon">edit</span><span>Modifier</span></p>
                </div>

                <div class="settings_info3 hover-icon">
                    <p class="settings_p">Qui peut vous trouver à l’aide de l’adresse e-mail que vous avez fournie ?</p>
                    <p class="settings_acces">Amis</p>
                    <p class="settings_edit_icon"><span class="material-icons-outlined hide_icon">edit</span><span>Modifier</span></p>
                </div>

                <div class="settings_info3 hover-icon">
                    <p class="settings_p">Qui peut vous trouver à l’aide du numéro de téléphone que vous avez fourni ?</p>
                    <p class="settings_acces">Moi uniquement</p>
                    <p class="settings_edit_icon"><span class="material-icons-outlined hide_icon">edit</span><span>Modifier</span></p>
                </div>
            </div>
        </div>
    </div>
<?php
}

function affichageLangue()
{
?>
    <h3>Paramètre linguistiques et régionaux</h3>
    <div class="settings_info">
        <h4>Langue de Social View</h4>
        <div class="settings_langue">
            <p>Langue des boutons, titre et autres textes</p>
            <p>Français (France)</p>
        </div>
    </div>
<?php
}

function affichageNotifications()
{
?>
    <h3>Paramètres de notifications</h3>
    <div class="settings_info">
        <h4>Les notifications que vous recevez</h4>

        <div class="settings_notif">

            <label for="commentaires" class="settings_label">Commentaires
                <div class="switch">
                    <input name="commentaires" id="commentaires" type="checkbox">
                    <span class="slider round"></span>
                </div>
            </label>


            <label for="identifications" class="settings_label">Identifications
                <div class="switch">
                    <input id="identifications" type="checkbox">
                    <span class="slider round"></span>
                </div>
            </label>


            <label for="actualites" class="settings_label">Actualités des amis
                <div class="switch">
                    <input id="actualites" type="checkbox">
                    <span class="slider round"></span>
                </div>
            </label>


            <label for="invitations" class="settings_label">Invitations
                <div class="switch">
                    <input id="invitations" type="checkbox">
                    <span class="slider round"></span>
                </div>
            </label>


            <label for="groupes" class="settings_label">Groupes
                <div class="switch">
                    <input id="groupes" type="checkbox">
                    <span class="slider round"></span>
                </div>
            </label>

            <!-- fin settings_notif -->
        </div>

        <!-- fin settings_info -->
    </div>
<?php
}

function parametres()
{
    $page = isset($_GET['settings']) ? $_GET['settings'] : '';
    if ($page === 'confidentialite') {
        affichage();
        affichageConfidentialite();
    } elseif ($page === 'langue') {
        affichage();
        affichageLangue();
    } elseif ($page === 'notifications') {
        affichage();
        affichageNotifications();
    } else {
        affichageParametre();
    }
}
?>

<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/switch.css">
<link rel="stylesheet" href="styles/settings.css">

<div class="settings_container">
    <div class="Parameter">
        <h1>Paramètres</h1>
        <div class="settings_list">
            <h4 class="settings_category">
                <span class="material-icons-outlined">lock</span>
                <a href="settings.php?settings=confidentialite" class="settings_links">
                    Confidentialité
                </a>
            </h4>
            <h4 class="settings_category">
                <span class="material-icons-outlined">language</span>
                <a href="settings.php?settings=langue" class="settings_links">
                    Langue et region
                </a>
            </h4>
            <h4 class="settings_category">
                <span class="material-icons-outlined">notifications</span>
                <a href="settings.php?settings=notifications" class="settings_links">
                    Notifications
                </a>
            </h4>

        </div>
    </div>

    <div class="settings_block">
        <div>
            <a href="settings.php" class="settings_return">
                <span class="material-icons-outlined material-icons-round return_icon">arrow_back</span>
                <p>Retour</p>
            </a>
        </div>
        <div>
            <?php
            parametres();
            ?>
        </div>
    </div>

</div>

<?php
include 'footer.php'
?>