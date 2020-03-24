# TP Intranet CESI

## Instructions

### Liste des commandes à executer

Vous devez cloner le dépot :
>git clone https://github.com/BreizhTek/IntranetCesi.git

Installation des dépendances :
>npm install

:wrench: Un système de routage est présent, les règles sont inscrites dans le fichier .htaccess.
Si vous avez des problèmes avec des accès refuser cela peux venir de ce fichier.

Le but est de redirigé les requetes sur le fichier index.php qui se chargera de renvoyer le contenu.

## Chat

Si vous souhaiter utilisez le système de chat vous devez lancer le websocket

Pour ce faire :

>php server-chat.php

:point_right: Si vous installer le site sur un serveur veillez à ce que le websocket reste constamment ouvert. (Port: 8080)

# Vous pouvez également consultez le site sans installation sur http://telougat.space