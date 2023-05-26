<?php include 'template/components/header.php' ?>
<link rel="stylesheet" href="../template/styles/group_page_list.css">

<?php

if (isset($_GET["searchPageName"])) {
    global $searchResults;
}

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

function affichageResearch($searchResults)
{
    global $host;
?>
    <h3>Découvrir des pages</h3>
    <h4>Pages qui pourraient vous intéresser.</h4>
    <div class="groups_grid">

        <?php foreach ($searchResults as $result) { ?>

            <div class="groups_group_preview">
                <img src=<?= $result["profile_banner"] ?> alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name"><?= $result["name"] ?></p>
                    <div class="pages_page_info">
                        <p>Catégorie</p>
                        <p>X personnes qui aiment la page</p>
                    </div>
                    <a href=<?= "http://" . $host . "/page/page?name=" . $result["name"] ?> class="groups_join">Voir la page</a>
                </div>
            </div>

        <?php } ?>
    </div>
<?php
}

function affichageDiscover()
{
?>
    <h3>Résultat de vos recherches : </h3>
    <!-- <h4>Pages qui pourraient vous intéresser.</h4> -->
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 10; $i++) { ?>

            <div class="groups_group_preview">
                <img src="../template/img/blue-texture-marble.png" alt="" class="groups_group_banner">
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
    global $host;
?>
    <h3>Tous les pages dont vous gérez (X)</h3>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 3; $i++) { ?>

            <div class="groups_group_preview">
                <img src="../template/img/blue-texture-marble.png" alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name">Nom de la page</p>
                    <div class="groups_group_info">
                        <p>Catégorie</p>
                        <p>X personnes qui aiment la page</p>
                    </div>
                    <p class="groups_join"><a href=<?= "http://" . $host . "/page/page" ?>>Voir la page</a></p>
                </div>
            </div>

        <?php } ?>
    </div>

    <h3>Toutes les pages dont vous suivez (X)</h3>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 10; $i++) { ?>

            <div class="groups_group_preview">
                <img src="../template/img/blue-texture-marble.png" alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name">Nom de la page</p>
                    <div class="pages_page_info">
                        <p>Catégorie</p>
                        <p>X personnes qui aiment la page</p>
                    </div>
                    <p class="groups_join"><a href=<?= "http://" . $host . "/page/page" ?>>Voir la page</a></p>
                </div>
            </div>

        <?php } ?>
    </div>
<?php
}

function parametres($searchResults)
{
    $page = isset($_GET['groups']) ? $_GET['groups'] : '';
    if ($page === 'discover') {
        affichage();
        affichageDiscover();
    } elseif ($page === 'mygroups') {
        affichage();
        affichageMyGroups();
    } elseif ($page === 'name') {
        affichage();
        affichageResearch($searchResults);
    } else {
        affichageGroups();
    }
}

?>

<div class="group_container">

    <div class="group_settings">
        <div class="group_settings_fil_arianne">
            <p><a href=<?= "http://" . $host . "/home" ?>>Accueil</a></p>
            <p class="material-icons-round">chevron_right</p>
            <p>Pages</p>
        </div>

        <h3 style="white-space: nowrap;">Pages</h3>
        <form action="<?= "http://" . $host . "/page/pageList" ?>" method="GET" class="page_list_form">
            <input type="text" name="searchPageName" placeholder="Rechercher une page..." class="group_input groups_mobile">
            <input type="submit" class="Submitbutton" value="Valider">
        </form>

        <h4 class="settings_category">
            <span class="material-icons">explore</span>
            <a href=<?= "http://" . $host . "/page/pageList?groups=discover" ?> class="settings_links">
                Découvrir
            </a>
        </h4>

        <h4 class="settings_category">
            <span class="material-icons">library_add_check</span>
            <a href=<?= "http://" . $host . "/page/pageList?groups=mygroups" ?> class="settings_links">
                Vos pages
            </a>
        </h4>

        <p class="Submitbutton"><a href=<?= "http://" . $host . "/page/pageCreate" ?>>Créer une page</a></p>


    </div>


    <div class="groups_discover">
        <div>
            <a href="page_list.php" class="groups_return">
                <span class="material-icons-outlined material-icons-round return_icon">arrow_back</span>
                <p>Retour</p>
            </a>
        </div>
        <?php
        parametres($host);
        ?>
    </div>
</div>

<?php include 'template/components/footer.php' ?>