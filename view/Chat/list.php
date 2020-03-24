<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../style.css">
    <script src="../../ressources/js/jquery-3.4.1.min.js"></script>

    <title>Liste des channels</title>
</head>
<body>

    <?php require_once __DIR__ . "/../../ressources/composants/header.php";?>

    <div class="w-full min-h-screen md:flex md:items-center">

        <div class="flex flex-wrap w-full justify-center">

            <div class="bg-blue p-8 rounded-lg text-white md:w-1/2">

                <h1 class="font-bold text-3xl">Vos channels :</h1>

                <div id="list" class="text-xl py-2">

                    <?php foreach ($channels as $channel) { ?>
                        <div class="py-2">
                            <p class="hover:underline"><a href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]?channel=" . $channel['Id'] ?>"><?php echo $channel['Name']; ?></a></p>
                            <hr/>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <div class="h-full bg-blue mt-4 md:mt-0 p-8 rounded-lg text-white ml-2">
                <p class="mb-2">Créé un channel :</p>
                <input class="text-black px-1" type="text" id="newChannel" placeholder="Nom du channel"/>
                <button onclick="addChannel()" class="ml-2">Ajouter</button>
                <p id="errorMessage" class="text-red-500 mt-2 hidden"></p>
            </div>

        </div>


    </div>

    <script>

        function addChannel() {

            let newChannel = document.getElementById('newChannel');
            let list = document.getElementById('list');
            let error = document.getElementById('errorMessage');

            $.get("/api/chat/", {createchannel: newChannel.value})
            .done(function(data)
            {
                data = JSON.parse(data);
                list.innerHTML = list.innerHTML + '<div class="py-2"><p class="hover:underline"><a href="' + (window.location.href+'?channel='+data.channel) + '">' + newChannel.value + '</a></p><hr/></div>';
                error.classList.remove('hidden');
                error.innerText = "Succès";
            })
            .fail(function()
            {
                error.classList.remove('hidden');
                error.innerText = "Erreur !";
                console.log('Erreur');
            })


        }

    </script>

</body>
</html>
