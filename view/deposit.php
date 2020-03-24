<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="ressources/js/upload.js"></script>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../autre/fontello/css/fontello.css">
    <link rel="stylesheet" href="ressources/css/depo.css">
</head>
<body class="lg:overflow-visible min-h-screen flex flex-col">


<!------------------------FILE'S UPLOAD---------------------------------->
<!--<div>-->
        <div id="deposit" class="bg-gray-100">
            <form method="POST" id="formUpload" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="25000000">
                <input  type="file" name="selectedFile[]" multiple>
                <input type="submit" id="btnUpload" />
            </form>
            <button  id="btnUpload" >DEpo</button>

        </div>

    <div id="btnDelete">Supprimer</div>

<!---->
<!--    </div>-->

    <!-------------------------------------------------------------------->
    <div class="flex flex-col lg:flex-none bg-gray-100">
        <!-- File List -->
        <div class="flex lg:w-4/5 bg-red-100 justify-center lg:m-3 m-1 ">

            <div class="lg:m2 lg:p-2 bg-white w-full" id="parentNode">

                <div class="flex flex-row w-full mb-3" id="parentList">

                    <div class="w-1/6 lg:w-1/12  text-center">

                    </div>

                    <div class="w-5/6 lg:w-6/12  text-center">
                        <p>Fichier</p>
                    </div>

                    <div class="w-0 lg:w-3/12  text-center invisible lg:visible">
                        <p>Auteur</p>
                    </div>

                    <div class="w-0 lg:w-2/12  text-center invisible lg:visible">
                        <p>Taille</p>
                    </div>

                </div>

            </div>

        </div>

        <!-- Action button -->
        <div class="flex flex-wrap md:flex-row sm:flex-row justify-center lg:flex-col m-1  lg:w-2/12 bg-blue lg:fixed  lg:bottom-0 lg:right-0 lg:mb-20 ">

                <div class="bg-red-400  lg:w-11/12 m-2 ">
                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded w-full">Télécharger</button>
                </div>

                <div class=" bg-red-400 lg:w-11/12 m-2">
                     <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded w-full">Télécharger</button>
                </div>


                <div class=" bg-red-400 lg:w-11/12 m-2">
                    <button id="btnDel" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded w-full">Supprimer</button>
                </div>

                <div class=" bg-red-400  lg:w-11/12 m-2">
                    <button id="btnFolder" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded w-full">Créer un dossier</button>
                </div>

                <div id="insertName" class="flex flex-wrap bg-red-400  lg:w-11/12 m-2 justify-center">
                    <input type="text" id="folderInput" class="focus:underline bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded lg:w-3/4">
                <button disabled="disabled" id="btnValidation" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded lg:w-1/4 ">Yes</button>
            </div>

            </div>
    </div>
<!-------------------------------------------------------------------->
</body>
</html>