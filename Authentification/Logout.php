<?php
// logout.php : Comment se déconnecter
require('Database.php');
// Etape 1 : On démarre la session
session_start();
// Etape 2 : On supprime tout le contenu de la session
session_destroy();
// Etape 3 : On redirige la personne vers le login (par exemple)
header('Location: login.php');
// C'est fini 