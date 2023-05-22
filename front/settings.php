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
    affichageProfil();
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

function affichageProfil()
{
?>
    <h3>Paramètre du profil</h3>
    <div class="settings_profile">

        <div>
            <h4>Gérez les informations de votre profil</h4>
            <form class="login_signup">
                <div class="radiobox">
                    <label class="role"><input name="role" type="radio" name="bouton" value="madame" checked>Madame</label>
                    <label class="role"><input name="role" type="radio" name="bouton" value="monsieur">Monsieur</label>
                    <label class="role"><input name="role" type="radio" name="bouton" value="autres">Autre(s)</label>
                </div>
                <div class="row">
                    <input name="firstname" type="text" class="inputText" placeholder="Prénom" required>
                </div>
                <div class="row">
                    <input name="lastname" type="text" class="inputText" placeholder="Nom de famille" required>
                </div>
                <div class="row">
                    <input name="username" type="text" class="inputText" placeholder="Pseudo" required>
                </div>
                <div class="row">
                    <input name="birthdate" type="date" class="inputText" placeholder="Date de naissance" required>
                </div>
                <div class="row">
                    <input name="phone" type="phone" class="inputText" placeholder="Téléphone" pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                </div>
                <div class="row">
                    <input name="email" type="email" class="inputText" placeholder="Adresse e-mail" required>
                </div>

                <input type="submit" class="Submitbutton" value="Mettre à jour">

            </form>
        </div>

        <div>
            <h4>Modifier votre mot de passe</h4>
            <form class="login_signup">

                <div class="row">
                    <input name="password" type="password" class="inputText" placeholder="Mot de passe" required>
                </div>

                <div class="row">
                    <input name="confirmedPassword" type="password" class="inputText" placeholder="Confirmation du mot de passe" required>
                </div>

                <input type="submit" class="Submitbutton" value="Changer le mot de passe">
            </form>
        </div>

        <div>
            <h4>Désactivation du compte</h4>
            <form class="login_signup">
                <input type="submit" class="Submitbutton desactivate" value="Désactiver votre compte">
            </form>
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

function affichageTheme()
{
?>
    <h3>Thème</h3>
    <div class="settings_info">
        <h4>Ajustez l’apparence de Social View pour réduire les reflets et reposer vos yeux.</h4>

        <div class="settings_notif">

            <label for="theme-toggle" class="settings_label">Thème
                <div class="switch">
                    <input name="theme" id="theme-toggle" type="checkbox">
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
    } elseif ($page === 'profile') {
        affichage();
        affichageProfil();
    } elseif ($page === 'theme') {
        affichage();
        affichageTheme();
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

            <a href="settings.php?settings=profile" class="settings_links">
                <h4 class="settings_category">
                    <span class="material-icons">person</span>
                    Profil
                </h4>
            </a>

            <a href="settings.php?settings=confidentialite" class="settings_links">
                <h4 class="settings_category">
                    <span class="material-icons-outlined">lock</span>
                    Confidentialité
                </h4>
            </a>

            <a href="settings.php?settings=langue" class="settings_links">
                <h4 class="settings_category">
                    <span class="material-icons-outlined">language</span>
                    Langue et region
                </h4>
            </a>

            <a href="settings.php?settings=notifications" class="settings_links">
                <h4 class="settings_category">
                    <span class="material-icons-outlined">notifications</span>
                    Notifications
                </h4>
            </a>

            <a href="settings.php?settings=theme" class="settings_links">
                <h4 class="settings_category">
                    <span class="material-icons-outlined">dark_mode</span>
                    Thème
                </h4>
            </a>

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