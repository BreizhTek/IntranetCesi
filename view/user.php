<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="flex justify-center my-4">
        <form action="user" method="POST" class="w-full max-w-lg">

            <div class="flex flex-wrap -mx-3 mb-6 hidden">
                <div class="w-full px-3">
                    <label
                        for="Id"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Id : </label>
                    <input
                        type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="Id"
                        name="Id"
                        value="<?php echo (($row <> "") ? $row['Id'] : "")?>"
                    >
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label
                        for="Level"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Status : </label>
                    <input
                        type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="Level"
                        name="Level"
                        value="<?php echo (($row <> "") ? $row['Level'] : "")?>"
                    >
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label
                        for="Post"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Post : </label>
                    <input
                        type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="Post"
                        name="Post"
                        value="<?php echo (($row <> "") ? $row['Post'] : "")?>"
                    >
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label
                        for="FristName"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Nom : </label>
                    <input
                        type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="FristName"
                        name="FristName"
                        value="<?php echo (($row <> "") ? $row['First_name'] : "")?>"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label
                        for="LastName"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Prénom : </label>
                    <input
                        type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="LastName"
                        name="LastName"
                        value="<?php echo (($row <> "") ? $row['Last_name'] : "")?>"
                    >
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label
                        for="Brith"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Date de Naissance : </label>
                    <input
                        type="date"
                        1class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="Brith"
                        name="Brith"
                        value="<?php echo (($row <> "") ? $row['Birth'] : "")?>"
                    >
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label
                        for="Phone"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Téléphone : </label>
                    <input
                        type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="Phone"
                        name="Phone"
                        value="<?php echo (($row <> "") ? $row['Phone'] : "")?>"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label
                        for="Mail"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >E-Mail : </label>
                    <input
                        type="email"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="Mail"
                        name="Mail"
                        value="<?php echo (($row <> "") ? $row['Mail'] : "")?>"
                    >
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label
                        for="Adress"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Adresse : </label>
                    <input
                        type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="Adress"
                        name="Adress"
                        value="<?php echo (($row <> "") ? $row['Address'] : "")?>"
                    >
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label
                        for="NameTutor"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Nom Tutuer : </label>
                    <input
                        type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="NameTutor"
                        name="NameTutor"
                        value="<?php echo (($row <> "") ? $row['Tutor'] : "")?>"
                    >
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label
                        for="MailTutor"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >Mail  Tuteur : </label>
                    <input
                        type="email"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="MailTutor"
                        name="MailTutor"
                        value="<?php echo(($row <> "") ? $row['Tutor_mail'] : "")?>"
                    >
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label
                        for="Password"
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >MDP : </label>
                    <input
                        type="password"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="Password"
                        name="Password"
                        value="<?php echo (($row <> "") ? $row['Password'] : "")?>"
                    >
                </div>
            </div>
            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                Fichier : <input type="file" name="Picture" value="<?php echo(($row <> "") ? $row['Picture'] : "") ?>">
            </div>
            <?php
            if (isset($row['Picture'])){
                ?>
                <img class="h-64 w-56" src="..\\storage\\users\\<?php echo $row['Picture'] ?>">
                <?php
            } else {
                ?>
                <img class="h-64 w-64" src="..\\storage\\users\\noprofil.png">
                <?php
            }
            ?>
            </br>
            <button
                type="submit"
                class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded mt-6"
                name="<?php echo(($row <> "") ? "envoyerUpdate" : "envoyerInsert")?>"
            >Enregistrer</button>
        </form>
    </div>
    </br>
    <?php if(isset($row) && $row <> null && $row <> ""){
        ?>
        <div>
            <h1>Voiture(s) : (Nb : <?php echo $nbCar ?>)</h1>
            <a href="../car">Ajout Voiture</a>
            <table>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Plaque d'immatriculation</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Modèle</th>
                    <th scope="col">Couleur</th>
                </tr>
                <?php
                foreach ($carByUser as $car){
                    ?>
                    <tr>
                        <td>
                            <a href="../car/<?php echo $car['Id'] ?>">Lien de modification</a>
                        </td><td>
                            <?php echo $car['Plate'] ?>
                        </td><td>
                            <?php echo ((isset($car['Brand']) && isset($car['Brand']) <> "" && isset($car['Brand']) <> null) ? $car['Brand'] : "-")?>
                        </td><td>
                            <?php echo ((isset($car['Model']) && isset($car['Model']) <> "" && isset($car['Model']) <> null) ? $car['Model'] : "-")?>
                        </td><td>
                            <?php echo ((isset($car['Color']) && isset($car['Color']) <> "" && isset($car['Color']) <> null) ? $car['Color'] : "-")?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            </br>
        </div>
    <?php
    }
    ?>
    </body>
</html>
