## Installation

Ce dépôt contient tout ce qu'il faut pour avoir un CRUD fonctionnel qui permettra la gestion de la maintenance des produits agroalimentaire à un ou plusieurs utilisateurs.
Ces instructions vont vous permettre d'obtenir une copie fonctionnelle du projet sur votre poste de travail.
Commencer par cloner le repository de github afin d'avoir une copie parfaite.
git clone https://github.com/Lou-Duquenoy/Testaptitude.git
Pour ma part, j'ai personnellement utilisé Wamp pour ce projet comme étant celui que je connais le plus et que j'ai le plus utiliser ces dernières années.
Plateforme de développement web : Wamp.
Editeur de texte : Visual Studio Code.
Création de la bdd à l'aide du script dans le dossier sql du projet : importer donc testaptitude.sql dans phpMyAdmin.
Le projet pourra donc maintenant être lancé et visible via le lien : localhost/Testaptitude

## Inscription connection et mot de passe oublié / HTML, CSS, PHP, Jquery

Avant toute chose, j'ai pensé à créer un système de connexion, d'inscription et de mot de passe oublié pour sécuriser notre page web comme cela concerne de la maintenance soit de l'administration, je trouvais que cela n'était pas négligeable pour pouvoir protéger toutes ces données qu'on va afficher. Pour commencer, vous serez automatiquement redirigé vers la page login.php puisqu'à chaque fois que l'on se déconnecte la session se détruit permettant ainsi d'éviter de contourner le système. Dans cette page, l'email et le mot de passe qu'il faut saisir bénéficiera de fonctionnalités allant contre les injections SQL :-Les requêtes préparées qui va permettre aux données d'être directement interprétées indépendamment de la requête elle-même en plus de gagner en performance.-La fonction htmlspecialchars pour convertir les caractères spéciaux en entités HTML afin d'empêcher de l'injection lors de la création du document. De plus, il y aura une double sécurité, au niveau de la saisie pour les deux champs grâce à des fonctions JavaScript qui indiqueront directement à l'utilisateur si sa saisie est correcte et non. Pour ce qui est du mot de passe oublié, il y aura un token qui seras enregistrer durant l'inscription afin que l'utilisateur puisse recevoir un lien sécurisé seulement quand l'email qu'il aura rentré sera correct et que le compte existe. Ainsi, une autre table sera créer : "password_recover" et stockera un second token de confirmation pour l'utilisateur quand le lien sera envoyer. Pour finir avec cette partie, l'inscription comporte différentes règles avec le mot de passe qui sera hasher au cas où une personne malveillante aurait accès à la base de données par exemple. La fonction de hachage utilisée est sha256 composée de 64 caractères hexadécimaux qui permet de renforcer la sécurité de cette donnée au maximum, mais aussi les pseudo et email qui ne devront pas dépasser 100 caractères.


## Page de maintenance / HTML, CSS, PHP

La maintenance de ces données consistera en 4 champs, dont un champ "upload" qui va stocker toutes les images dans le dossier "img" du projet pour ensuite grâce à la base de données pouvoir les afficher dynamiquement. Ajouter à cela, les images auront des règles à respecter tout d'abord avec les extensions soit jpg, png ou jpeg qui peuvent être adaptées pour en ajouter de nouvelles si demander et la taille qui pour ce cas ne doit pas dépasser 500 000 octets pour que l'image soit affiché. Enfin, pour ajouter, modifier et supprimer : un premier clic sur le bouton "Modifier" permettra de changer l'action possible de l'utilisateur et ainsi de pouvoir changer une donnée ou plusieurs contrairement au bouton supprimer qui effacera tout le produit enregistrer.


## Api rest / PHP

La dernière partie consistait à pouvoir afficher ses informations. Pour cela la méthode GET permet de justement retrouver ses données et les stocker dans un tableau avec une requête une par une avec toutes leurs données respectives.
Pour y accéder vous devez aller sur : http://localhost/testaptitude/admin/produits.php

## Evolutions du code

Pour conclure sur ce projet, je sais que je peux y appliquer encore certaines choses comme javais penser à utiliser une fonction uniqid pour ajouter encore plus de sécurité à l'image (remplacer le nom du fichier par l'identifiant unique stocker dans la base de données lors de "l'upload") mais aussi le bouton supprimer pour la page de maintenance qui ne permet pas nécessairement que de supprimer tout le produit, mais aussi une donnée à la fois comme pour l'ajout ou la mise à jour. Et pour l'API REST j'ai pu remarquer un moyen pour que toutes les méthodes d'une API comme celle ci puisse fonctionner soit POST, PUT et DELETE donc je suis encore en train de voir ce que je pourrais ajouter dans cette partie.
