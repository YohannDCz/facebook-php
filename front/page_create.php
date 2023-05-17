<?php include 'header.php' ?>
<link rel="stylesheet" href="styles/group_create.css">
<link rel="stylesheet" href="styles/page_create.css">


<div class="group_container">

    <div class="page_settings">
        <div class="group_settings_fil_arianne">
            <p><a href="page_list.php">Pages</a></p>
            <p class="material-icons-round">chevron_right</p>
            <p>Créer une page</p>
        </div>

        <h3 style="white-space: nowrap;">Créer une page</h3>

        <p class="page_settings_p">Les internautes accèdent à votre Page pour en savoir plus sur vous. Veuillez à y inclure toutes les informations dont ils pourraient avoir besoin.</p>

        <form action="" class="group_form">

            <div class="page_div_input">
                <input type="text" name="" id="" placeholder="Nom de la page (obligatoire)" class="group_input" maxlength="75" required>
                <p class="page_settings_p">Utilisez le nom de votre entreprise, marque ou organisation, ou un nom qui décrit votre Page.</p>
            </div>

            <div class="page_div_input">
                <input type="text" name="" id="" placeholder="Catégorie (obligatoire)" class="group_input" maxlength="75" required>
                <p class="page_settings_p">Saisissez la catégorie qui vous décrit le mieux.</p>
            </div>

            <div class="page_div_input">
                <input type="textarea" name="" id="" placeholder="Biographie (facultatif)" class="group_input" maxlength="140">
                <p class="page_settings_p">Dites-en plus sur votre activité.</p>
            </div>

            <input type="submit" value="Créer la page" class="Submitbutton">

        </form>

    </div>


    <div class="group_preview">
        <p class="group_text_preview">
            Aperçu de la page
        </p>

        <div class="page_banner">
            <div class="page_banner_add_banner">
                <span class="material-icons">add_a_photo</span>
            </div>

            <div class="page_banner_container_pp">
                <img src="./img/pp.png" alt="page_pp" class="page_banner_pp">
            </div>

        </div>

        <h1>Nom de la page</h1>

        <div class="page_preview_nav">
            <div class="page_preview_titre">
                <h4>À propos</h4>
                <h4>Publications</h4>
                <h4>Followers</h4>
                <h4>Photos</h4>
            </div>

            <div class="page_preview_icons">
                <div class="group_preview_publication_sub group_preview_button">
                    <span class="material-icons">library_add</span>
                    <p>Suivre</p>
                </div>

                <div class="group_preview_publication_sub group_preview_button">
                    <span class="material-icons">chat</span>
                    <p>Message</p>
                </div>
            </div>
        </div>

        <div class="group_preview_main">

            <div class="group_preview_aboutus">
                <h4>À propos</h4>
                <div class="group_preview_publication_sub">
                    <span class="material-icons">library_add_check</span>
                    <p>0 Followers</p>
                </div>
                <div class="group_preview_publication_sub">
                    <span class="material-icons">info</span>
                    <p>Page - Catégorie</p>
                </div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam rerum officia illum vel praesentium rem ipsam, cumque fugiat! Ut minus, dolore a perspiciatis molestias similique illum provident aut officiis sapiente!</p>
            </div>

            <div class="group_preview_publication_main">
                <div class="group_preview_publication">
                    <h4>Publications</h4>
                </div>
            </div>

        </div>

    </div>
</div>

<?php include 'footer.php' ?>