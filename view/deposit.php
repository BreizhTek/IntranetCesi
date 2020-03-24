<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="ressources/js/upload.js"></script>
</head>
<body>
<!------------------------FILE'S UPLOAD---------------------------------->
    <div id="deposit" class="bg-gray-100">
        <form method="POST" id="formUpload" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000"> <!-- define the max file's size -->
            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"  type="file" name="selectedFile" id="sel">  <!-- Button to choose the file -->
            <input type="submit" id="btnUpload" value="Déposer"> <!-- Button to send the file -->
        </form>
        <div id="waitGif">('<img src="ressources/autre/gif/waiting.gif">');  </div> <!-- waiting animation -->
    </div>
<div id="btnDelete">Supprimer</div>
    <div id="uploadMessage">SALUT</div>

<h1>LISTE DES FICHIERS</h1>
<div id="parentList"></div>


<!-------------------------------------------------------------------->

</body>
</html>