<?php
require './ressources/composants/templatePage.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!------------------------FILE'S UPLOAD---------------------------------->
<div id="deposit" action="upload" class="bg-gray-100">
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000"> <!-- define the max file's size -->
        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"  type="file" name="selectedFile" id="sel">  <!-- Button to choose the file -->
        <input type="submit" id="btnUpload" name="send" value="Déposer"> <!-- Button to send the file -->
    </form>
    <div>Message :</div>
    <div id="uploadMessage"></div>
    <button id="test">Afficher</button>
    <button><a href="">Supprimmer</a></button>

<!-------------------------------------------------------------------->
    <script>
    $( document ).ready(function() {

        document.getElementById('test').addEventListener('click', makeRequest);

        function makeRequest() {
            $.ajax({
                type: 'POST',
                url: '/api/upload',
                data: { action: 'upload'},
                dataType: 'text',
                success: function (lemessage,  status) {
                    document.getElementById("uploadMessage").innerHTML = JSON.parse(lemessage);
                }
            });

        }
    });
    </script>
