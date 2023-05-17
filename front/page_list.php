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
    <h3>Découvrir des pages</h3>
    <h4>Pages qui pourraient vous intéresser.</h4>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 10; $i++) { ?>

            <div class="groups_group_preview">
                <img src="./img/blue-texture-marble.png" alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name">Nom de la page</p>
                    <div class="pages_page_info">
                        <p>Catégorie</p>
                        <p>X personnes qui aiment la page</p>
                    </div>
                    <p class="groups_join">Suivre la page</p>
                </div>
            </div>

        <?php } ?>
    </div>
<?php
}

function affichageMyGroups()
{
?>
    <h3>Toutes les pages dont vous suivez (X)</h3>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 10; $i++) { ?>

            <div class="groups_group_preview">
                <img src="./img/blue-texture-marble.png" alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name">Nom de la page</p>
                    <div class="pages_page_info">
                        <p>Catégorie</p>
                        <p>X personnes qui aiment la page</p>
                    </div>
                    <p class="groups_join"><a href="page_page.php">Voir la page</a></p>
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
            <p>Pages</p>
        </div>

        <h3 style="white-space: nowrap;">Pages</h3>

        <input type="text" name="" id="" placeholder="Rechercher une page..." class="group_input groups_mobile">

        <h4 class="settings_category">
            <span class="material-icons">explore</span>
            <a href="page_list.php?groups=discover" class="settings_links">
                Découvrir
            </a>
        </h4>

        <h4 class="settings_category">
            <span class="material-icons">library_add_check</span>
            <a href="page_list.php?groups=mygroups" class="settings_links">
                Vos pages
            </a>
        </h4>

        <p class="Submitbutton"><a href="page_create.php">Créer une page</a></p>


    </div>


    <div class="groups_discover">
        <div>
            <a href="page_list.php" class="groups_return">
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