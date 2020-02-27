<!------------------------FILE'S UPLOAD---------------------------------->
<div id="deposit" action="" class="bg-gray-100">
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000"> <!-- define the max file's size -->
    Fichier : <input type="file" name="selectedFile"> <!-- Button to choose the file -->
    <input type="submit" name="send" value="Déposer"> <!-- Button to send the file -->
</form>

<p>Retour :<?php $Message ?> </p>
</div>
<button><a href="">Afficher</a></button>
<button><a href="">Supprimmer</a></button>
<!-------------------------------------------------------------------->
