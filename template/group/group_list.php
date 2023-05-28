<?php include 'template/components/header.php' ?>
<link rel="stylesheet" href="../template/styles/group_page_list.css">

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
                <img src="../template/img/blue-texture-marble.png" alt="" class="groups_group_banner">
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

function affichageMyGroups($host)
{
?>
    <h3>Tous les groupes dont vous gérez (X)</h3>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 3; $i++) { ?>

            <div class="groups_group_preview">
                <img src="../template/img/blue-texture-marble.png" alt="" class="groups_group_banner">
                <div class="groups_group_content">
                    <p class="groups_group_name">Nom du groupe</p>
                    <div class="groups_group_info">
                        <p>X Membres</p>
                        <p>X Publications</p>
                    </div>
                    <p class="groups_join"><a href=<?= "http://" . $host . "/group/Page" ?>>Voir le groupe</a></p>
                </div>
            </div>

        <?php } ?>
    </div>

    <h3>Tous les groupes dont vous êtes membre (X)</h3>
    <div class="groups_grid">

        <?php for ($i = 1; $i <= 10; $i++) { ?>

            <div class="groups_group_preview">
                <img src="../template/img/blue-texture-marble.png" alt="" class="groups_group_banner">
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

function parametres($host)
{
    $page = isset($_GET['groups']) ? $_GET['groups'] : '';
    if ($page === 'discover') {
        affichage();
        affichageDiscover();
    } elseif ($page === 'mygroups') {
        affichage();
        affichageMyGroups($host);
    } else {
        affichageDiscover();
    }
}

?>

<div class="group_container">

    <div class="group_settings">
        <div class="group_settings_fil_arianne">
            <p><a href=<?= "http://" . $host . "/home" ?>>Accueil</a></p>
            <p class="material-icons-round">chevron_right</p>
            <p>Groupes</p>
        </div>

        <h3 style="white-space: nowrap;">Groupes</h3>

        <input type="text" name="" id="" placeholder="Rechercher un groupe..." class="group_input groups_mobile">

        <h4 class="settings_category">
            <span class="material-icons">explore</span>
            <a href=<?= "http://" . $host . "/group/List?groups=discover" ?> class="settings_links">
                Découvrir
            </a>
        </h4>

        <?php
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            // echo "Session Invité";
        } else {
        ?>
            <h4 class="settings_category">
                <span class="material-icons">groups</span>
                <a href=<?= "http://" . $host . "/group/List?groups=mygroups" ?> class="settings_links">
                    Vos groupes
                </a>
            </h4>

            <p class="Submitbutton"><a href=<?= "http://" . $host . "/group/Create" ?>>Créer un groupe</a></p>
        <?php
        }
        ?>
    </div>


    <div class="groups_discover">
        <div>
            <a href="group_list.php" class="groups_return">
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