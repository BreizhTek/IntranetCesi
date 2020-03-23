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

    <div class="w-full min-h-screen flex flex-row justify-center items-center">

        <div class="bg-blue p-8 rounded-lg text-white">

            <h1 class="font-bold">Vos channels :</h1>

            <div id="list" class="text-right">

                <?php foreach ($channels as $channel) { ?>
                        <p class="my-2"><a href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]?channel=" . $channel['Id'] ?>"><?php echo $channel['Name']; ?></a></p>
                <?php } ?>

            </div>
        </div>

        <div class="h-full bg-blue p-8 rounded-lg text-white ml-2">
            <p class="mb-2">Créé un channel :</p>
            <input class="text-black px-1" type="text" id="newChannel" placeholder="Nom du channel"/>
            <button onclick="addChannel()">Ajouter</button>
        </div>

    </div>

    <script>

        function addChannel() {

            let newChannel = document.getElementById('newChannel');
            let list = document.getElementById('list');

            $.get("/api/chat/", {createchannel: newChannel.value})
            .done(function(data)
            {
                list.innerHTML = list.innerHTML + '<p class="my-2"><a href="' + (window.href+'?channel='+data.channel) + '"></a></p>';
            })
            .fail(function()
            {
                console.log('Erreur');
            })


        }

    </script>

</body>
</html>
