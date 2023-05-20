<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/group_page_list.css">

<?php

function affichage()
{
    echo '<style>
        @media (max-width: 1024px) {
        .groups_discover { display: flex; } 
        .group_settings { display: none; }
        }
        </style>';
}

function affichageGroups()
{
    echo '<style>
        @media (max-width: 1024px) {
        .group_settings { display: flex; }
        }
        </style>';
    affichageDiscover();
}

function affichageDiscover()
{
?>
    <h3>Découvrir</h3>
    <h4>Groupes qui pourraient vous intéresser.</h4>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 10; $i++) { ?>

            <div class="groups_group_preview">
                <img src="./img/blue-texture-marble.png" alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name">Nom du groupe</p>
                    <div class="groups_group_info">
                        <p>X Membres</p>
                        <p>X Publications</p>
                    </div>
                    <p class="groups_join">Rejoindre le groupe</p>
                </div>
            </div>

        <?php } ?>
    </div>
<?php
}

function affichageMyGroups()
{
?>
    <h3>Tous les groupes dont vous gérez (X)</h3>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 3; $i++) { ?>

            <div class="groups_group_preview">
                <img src="./img/blue-texture-marble.png" alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name">Nom du groupe</p>
                    <div class="groups_group_info">
                        <p>X Membres</p>
                        <p>X Publications</p>
                    </div>
                    <p class="groups_join"><a href="group_page.php">Voir le groupe</a></p>
                </div>
            </div>

        <?php } ?>
    </div>

    <h3>Tous les groupes dont vous êtes membre (X)</h3>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 10; $i++) { ?>

            <div class="groups_group_preview">
                <img src="./img/blue-texture-marble.png" alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name">Nom du groupe</p>
                    <div class="groups_group_info">
                        <p>X Membres</p>
                        <p>X Publications</p>
                    </div>
                    <p class="groups_join"><a href="group_page.php">Voir le groupe</a></p>
                </div>
            </div>

        <?php } ?>
    </div>
<?php
}

function parametres()
{
    $page = isset($_GET['groups']) ? $_GET['groups'] : '';
    if ($page === 'discover') {
        affichage();
        affichageDiscover();
    } elseif ($page === 'mygroups') {
        affichage();
        affichageMyGroups();
    } else {
        affichageGroups();
    }
}

?>

<div class="group_container">

    <div class="group_settings">
        <div class="group_settings_fil_arianne">
            <p><a href="index.php">Accueil</a></p>
            <p class="material-icons-round">chevron_right</p>
            <p>Groupes</p>
        </div>

        <h3 style="white-space: nowrap;">Groupes</h3>

        <input type="text" name="" id="" placeholder="Rechercher un groupe..." class="group_input groups_mobile">

        <h4 class="settings_category">
            <span class="material-icons">explore</span>
            <a href="group_list.php?groups=discover" class="settings_links">
                Découvrir
            </a>
        </h4>

        <h4 class="settings_category">
            <span class="material-icons">groups</span>
            <a href="group_list.php?groups=mygroups" class="settings_links">
                Vos groupes
            </a>
        </h4>

        <p class="Submitbutton"><a href="group_create.php">Créer un groupe</a></p>


    </div>


    <div class="groups_discover">
        <div>
            <a href="group_list.php" class="groups_return">
                <span class="material-icons-outlined material-icons-round return_icon">arrow_back</span>
                <p>Retour</p>
            </a>
        </div>
        <?php
        parametres();
        ?>
    </div>
</div>

<?php include 'footer.php' ?>