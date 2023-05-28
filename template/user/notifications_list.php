<?php include 'template/components/header.php' ?>
<link rel="stylesheet" href="../template/styles/notifications_list.css">

<main>
    <div class="center-box">

        <h3>
            <?php
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                header('Location:' . 'http://' . $host . '/home');
                exit();
            } else {
                if (isset($_SESSION["last_name"]) && isset($_SESSION["first_name"])) {
                    echo "Notifications";
                }
            }
            ?>
        </h3>

        <div class="notifications_pop">
            <img class="photo-notif" src="../template/img/pp.png" alt="Photo 1" height="30px" width="30px">
            <div class="person_notif">
                <p><span class="name">Jonathan L.</span> a accepté votre demande d'ami.</p>
                <p class="date">il y a 10 min</p>
            </div>
            <div class="iconsupp">
                <a href="#"><span class="material-icons-outlined">delete</span></a>
            </div>
        </div>

        <div class="notifications_pop">
            <img class="photo-notif" src="../template/img/pp.png" alt="Photo 1" height="30px" width="30px">
            <div class="person_notif">
                <p><span class="name">Valentin M.</span> souhaite vous ajouter en ami.</p>
                <p class="date">il y a 10 min</p>
            </div>
            <div class="iconsupp">
                <a href="#"><span class="material-icons-outlined">delete</span></a>
            </div>
        </div>

        <div class="notifications_pop">
            <img class="photo-notif" src="../template/img/pp.png" alt="Photo 1" height="30px" width="30px">
            <div class="person_notif">
                <p><span class="name">Jonathan L.</span> a accepté votre demande pour rejoindre le groupe <span class="name">Machin bidule truc bidule truc</span>.</p>
                <p class="date">il y a 10 min</p>
            </div>
            <div class="iconsupp">
                <a href="#"><span class="material-icons-outlined">delete</span></a>
            </div>
        </div>

        <div class="notifications_pop">
            <img class="photo-notif" src="../template/img/pp.png" alt="Photo 1" height="30px" width="30px">
            <div class="person_notif">
                <p><span class="name">Jonathan L.</span> a accepté votre demande pour rejoindre le groupe <span class="name">Machin bidule truc bidule truc</span>.</p>
                <p class="date">il y a 10 min</p>
            </div>
            <div class="iconsupp">
                <a href="#"><span class="material-icons-outlined">delete</span></a>
            </div>
        </div>

        <div class="notifications_pop">
            <img class="photo-notif" src="../template/img/pp.png" alt="Photo 1" height="30px" width="30px">
            <div class="person_notif">
                <p><span class="name">Jonathan L.</span> a accepté votre demande pour rejoindre le groupe <span class="name">Machin bidule truc bidule truc</span>.</p>
                <p class="date">il y a 10 min</p>
            </div>
            <div class="iconsupp">
                <a href="#"><span class="material-icons-outlined">delete</span></a>
            </div>
        </div>

        <div class="notifications_pop">
            <img class="photo-notif" src="../template/img/pp.png" alt="Photo 1" height="30px" width="30px">
            <div class="person_notif">
                <p><span class="name">Jonathan L.</span> a accepté votre demande pour rejoindre le groupe <span class="name">Machin bidule truc bidule truc</span>.</p>
                <p class="date">il y a 10 min</p>
            </div>
            <div class="iconsupp">
                <a href="#"><span class="material-icons-outlined">delete</span></a>
            </div>
        </div>

        <div class="notifications_pop">
            <img class="photo-notif" src="../template/img/pp.png" alt="Photo 1" height="30px" width="30px">
            <div class="person_notif">
                <p><span class="name">Jonathan L.</span> a accepté votre demande pour rejoindre le groupe <span class="name">Machin bidule truc bidule truc</span>.</p>
                <p class="date">il y a 10 min</p>
            </div>
            <div class="iconsupp">
                <a href="#"><span class="material-icons-outlined">delete</span></a>
            </div>
        </div>

    </div>
</main>

<?php include 'template/components/footer.php' ?>