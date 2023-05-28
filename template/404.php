<?php include 'template/components/header.php' ?>

<div class="container_404">
    <h1>Erreur 404</h1>
    <h3>La page que vous recherchez semble introuvable.</h3>
    
    <p>Voici quelques liens utiles à la place :</p>
    <ul>
        <li><a href=<?= "http://" . $host . "/home" ?>>Page d'accueil</a></li>
        <!-- <li><a href=<?= "http://" . $host . "/home" ?>>Homepage</a></li> -->
    </ul>
</div>

<?php include 'template/components/footer.php' ?>