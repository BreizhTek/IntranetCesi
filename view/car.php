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
<div class="my-12 mx-12">
    <form action="../car" method="POST" class="w-full max-w-lg" enctype="multipart/form-data">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Id"
                    name="Id"
                    value="<?php echo (($row <> "") ? $row['Id'] : "")?>"
                    type="hidden"
                >
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label
                    for="Plate"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                >Plaque : </label>
                <input
                    type="text"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Plate"
                    name="Plate"
                    required="required"
                    value="<?php echo (($row <> "") ? $row['Plate'] : "")?>"
                >
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label
                    for="Brand"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                >Marque : </label>
                <input
                    type="text"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Brand"
                    name="Brand"
                    value="<?php echo (($row <> "") ? $row['Brand'] : "")?>"
                >
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label
                    for="Model"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                >Modèle : </label>
                <input
                    type="text"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Model"
                    name="Model"
                    value="<?php echo (($row <> "") ? $row['Model'] : "")?>"
                >
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label
                    for="Color"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                >Coleur : </label>
                <input
                    type="text"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Color"
                    name="Color"
                    value="<?php echo (($row <> "") ? $row['Color'] : "")?>"
                >
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label
                    for="NameUser"
                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                >Propriétaire : </label>
                <?php
                if (isset($row) && isset($row['Id_Users']) && $row['Id_Users'] <> "" && $row['Id_Users'] <> null){
                    ?>
                    <select  id="NameUser" name="NameUser" disabled>
                        <?php
                        foreach ($allUsers AS $user) {
                            if ($row['Id_Users'] == $user['Id']) {
                            ?>
                                <option
                                    value="<?php echo $user['Id'] ?>"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                >
                                    <?php echo $user['First_name'] . " - " . $user['Last_name'] ?>
                                </option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                <?php
                } else {
                    ?>
                    <select  id="NameUser" name="NameUser">
                        <option value="0">--Choisir une personne</option>
                        <?php
                        foreach ($allUsers AS $user){
                            ?>
                            <option
                                value="<?php echo $user['Id'] ?>"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            >
                                <?php echo $user['First_name']." - ".$user['Last_name'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                <?php
                }
                ?>
            </div>
        </div>

        </br>
        <button
            type="submit"
            class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
            name="<?php echo(($row <> "") ? "envoyerUpdate" : "envoyerInsert")?>"
        >Enregistrer</button>
    </form>
</div>
</body>
</html>
