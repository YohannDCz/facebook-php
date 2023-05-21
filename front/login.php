<?php 
    include 'header.php';

    if (isset($_COOKIE["error"])) {
        $error = $_COOKIE["error"];
        var_dump($error);
    } else { 
        $error = null;
    }
?>
<link rel="stylesheet" href="styles/login_signup.css">


<div class="login_signup_supercontainer">
    <div class="login_signup_container">
        <h1>Connexion</h1>
        <?php if ($error !== null) : ?>
            <div class="error" style="display: flex; justify-content: center; align-items: center; background-color:crimson; width: 100%; height: 40px;">
                <p style="color: white">Identifiants invalides !</p>
            </div>
        <?php endif; ?>
        <form class="login_signup" action="../src/controller/userController.php" method="POST">
            <div class="row">
                <input name="name" type="text" class="inputText" placeholder="Pseudo ou Email" required>
            </div>
            <div class="row">
                <input name="password" type="password" class="inputText" placeholder="Mot de passe" required>
            </div>
            
            <input type="submit" class="Submitbutton" value="Connexion">
            
        </form>

        <p><a href="signup.php">Pas encore de compte ? Inscris-toi ici !</a></p>

    </div>
</div>
<?php include 'footer.php' ?>