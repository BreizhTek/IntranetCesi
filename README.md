# TP Intranet CESI

## Instructions

Importer la base de données avec le fichiers `Intranet.sql`

Veuillez renseigné vos données de connexion en base de données.

Dans :

> db.php

> ressources/modele/ModelSocketAuthorization.php

Les champs sont explicites.

### Liste des commandes à executer

Vous devez cloner le dépot :
>git clone https://github.com/BreizhTek/IntranetCesi.git

Installation des dépendances :
>npm install

:wrench: Un système de routage est présent, les règles sont inscrites dans le fichier `.htaccess`.
Si vous avez des problèmes avec des accès refuser cela peux venir de ce fichier.

Le but est de redirigé les requêtes sur le fichier index.php qui se chargera de renvoyer le contenu.

## Chat

Si vous souhaiter utilisez le système de chat vous devez lancer le websocket

Pour ce faire :

>php server-chat.php

:point_right: Si vous installez le site sur un serveur veillé à ce que le websocket reste constamment ouvert. (Port: 8080)

## Les taches

### Effectuées

- Système de connexion utilisateurs
- Système d'enregistrement utilisateurs
- Système de dépôt de fichiers
- Trombinoscope
- Affichage des notes
- Chat
- Sécurisation des connexions au chat (Via Token)
- Création de channels
- Suppression de channels
- Retirer un utilisateur d'un channel
- Les utilisateurs peuvent signer (La feuille de présence)

### Pas terminées

- Animation lors d'un anniversaire d'utilisateur
- Pouvoir entrée des notes
- Pouvoir modifié les notes
- Téléchargement des fichiers du dépôt
- Système de classe et de niveaux de privilèges utilisateurs non gérés
- Avatar des utilisateurs personnalisé
- Suppression d'un message dans le chat

# Vous pouvez également consultez le site sans installation sur http://telougat.space