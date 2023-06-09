
# Social View

## Composition du Groupe 1

- CHARRIER Faustine
- LIN Chrisline
- CIEPLUCHA Hugo
- LUEMBE Jonathan
- CHARBEL Paul
- AKIL Mourad
- DI CRESCENZO Yohann
- MACHEFAUX Valentin

## Comment installer le projet
- DB utilisé : postgres
- importer la DB "Projet_SocialNetwork.sql"
- les informations pour se connecter à la DB sont dans src/model/Database.php
- définir le port du localhost dans /index.php

## Fonctionnalités
 - Créer un compte
 - Se connecter
 - Se déconnecter (cliquer sur le bouton de profil dans le header)
 - Accés au site en mode invité (personne non connecté) avec un mode restreint (pas la possibilité de publier ou poster des commentaires, d'accéder à certaines pages du site ou fonctionnalités)
 - Créer une page (depuis /home appuyer sur "Pages")
    - Changer la photo
    - Changer la bannière
 - Chercher une page et y accéder (depuis "Pages", la barre de recherche)
 - Créer un groupe (depuis /home appuyer sur "Groupes")
 - Mode sombre (cliquer sur le bouton de profil dans le header)

## PS
Il se peut que toutes les fonctionnalités ne soient pas toutes répertoriées
Vous pouvez voir le MCD de la BD : mcd.png