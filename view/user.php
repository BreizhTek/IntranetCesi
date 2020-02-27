<?php

require_once 'controller/ControllerUser.php';
if(isset($_POST['envoyerUpdate'])){
    $controllerUser = new ControllerUser();
    $controllerUser->update();
}elseif (isset($_POST['envoyerInsert'])){
    $controllerUser = new ControllerUser();
    $controllerUser->insert();
}

?>
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
<?php
// si $_post est vide alors on est en création
if (empty($_POST)){
?>
    <div>
        <form action="user" method="POST" class="w-full max-w-lg">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="Level" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Status : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Level" name="Level">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="FristName" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nom : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="FristName" name="FristName">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="LastName" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Prénom : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="LastName" name="LastName">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="Brith" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Date de Naissance : </label>
                    <input type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Brith" name="Brith">
                </div>
                <div class="form-group">
                    <label for="Class" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Promotion :</label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Class" name="Class">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="Phone" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Téléphone : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Phone" name="Phone">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="Mail" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">E-Mail : </label>
                    <input type="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="MAil" name="MAil">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="Adress" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Adresse : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Adress" name="Adress">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="NameTutor" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nom Tutuer : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="NameTutor" name="NameTutor">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="MailTutor" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Mail  Tuteur : </label>
                    <input type="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="MailTutor" name="MailTutor">
                </div>
            </div>
            <button type="submit" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" name="envoyerInsert">Enregistrer</button>
        </form>
    </div>
<?php
} else {
    // sinon on est en update
    ?>
    <div>
        <form action="user" method="POST" class="w-full max-w-lg">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="Level" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >Status : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Level" name="Level">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="FristName" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nom : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="FristName" name="FristName">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="LastName" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Prénom : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="LastName" name="LastName">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="Brith" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Date de Naissance : </label>
                    <input type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Brith" name="Brith">
                </div>
                <div class="form-group">
                    <label for="Class" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Promotion :</label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Class" name="Class">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="Phone" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Téléphone : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Phone" name="Phone">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="Mail" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">E-Mail : </label>
                    <input type="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="MAil" name="MAil">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="Adress" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Adresse : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="Adress" name="Adress">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="NameTutor" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nom Tutuer : </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="NameTutor" name="NameTutor">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label for="MailTutor" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Mail  Tuteur : </label>
                    <input type="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="MailTutor" name="MailTutor">
                </div>
            </div>
            <button type="submit" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" name="envoyerUpdate">Enregistrer</button>
        </form>
    </div>
<?php
}
?>
</body>
</html>




