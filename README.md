# MiniReseauxSocial

Projet Full-stack HETIC en collaboration avec :

<ul>
  <li><a href="https://github.com/Nyoote">C. Faustine</a></li>
  <li><a href="https://github.com/LinelinLove">L. Chrisline</a></li>
  <li><a href="https://github.com/Hierarque">C. Hugo</a></li>
  <li><a href="https://github.com/JoeLeDev">L. Jonathan</a></li>
  <li><a href="https://github.com/SirMacCready">C. Paul</a></li>
  <li><a href="https://github.com/MOURADAKIL3110">A. Mourad</a></li>
  <li><a href="https://github.com/YohannDCz">D. Yohann</a></li>
  <li><a href="https://github.com/ValentinMachefaux">M. Valentin</a></li>
</ul>

Nous vous avons mis un fichier BDD.sql à utiliser sous pgAdmin 4 ou assimilé.
De plus, voici le shéma de la base de donnée : https://dbdiagram.io/d/6459f1f7dca9fb07c4be90e8

Pour avoir accès à un sample de la page veuillez rentrer dans le navigatuer l'adresse suivante:
http://localhost:8888/page/page?name=Disney

## Déploiement sur Vercel

Ce projet inclut un fichier `vercel.json` pour faciliter son hébergement sur [Vercel](https://vercel.com/).
Avant de déployer, définissez les variables d'environnement suivantes dans votre projet Vercel :

- `DB_HOST`
- `DB_NAME`
- `DB_USER`
- `DB_PASSWORD`
- `DB_PORT`

Après avoir installé l'outil en ligne de commande Vercel, vous pouvez déployer l'application :

```bash
npm i -g vercel
vercel
```

Toutes les requêtes sont routées vers `index.php`, qui charge les différents routeurs de l'application.
