<?php
    $Token = password_hash($Token, PASSWORD_DEFAULT);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../style.css">
    <script src="../../ressources/js/jquery-3.4.1.min.js"></script>

    <title>Test WebSocket</title>
</head>
<body>

<input type="hidden" value="<?php echo $User; ?>" id="User">
<input type="hidden" value="<?php echo $Channel; ?>" id="Channel">
<input type="hidden" value="<?php echo $Token; ?>" id="Token">
<input type="hidden" value="<?php echo $Name; ?>" id="Name">

<div class="p-10">
    <input class="bg-black text-white" placeholder="message" id="message" type="text">
    <button class="bg-orange-600 px-4" id="button">Send</button>
</div>

<div class="min-h-screen w-full flex flex-col justify-center items-center">

    <div id="displayMessages" class="w-1/2 border-8 border-black">
    </div>

</div>

<script>

        let conn = new WebSocket('ws://localhost:8080');
        let button = document.getElementById('button');
        let message = document.getElementById('message');
        let box = document.getElementById('displayMessages');

        let user = document.getElementById('User');
        let channel = document.getElementById('Channel');
        let token = document.getElementById('Token');
        let name = document.getElementById('Name');

        function getMessageFormat(message, name)
        {
            if (!message)
                return false;

            if (message && name)
            {

                return '<div class="w-full p-4 flex flex-row">'
                    + '<p class="flex items-center font-bold">' + name + '</p>'
                    + '<p class="ml-4 bg-blue p-4 rounded-lg">' + message + '</p>'
                    + '</div>';

            }
            else
            {

                return '<div class="w-full p-4 flex flex-row justify-end">'
                + '<p class="ml-4 bg-blue p-4 rounded-lg">' + message + '</p>'
                + '</div>';

            }

        }


        conn.onopen = function(e) {
            console.log("Vous etes bien connecté au chat !");

            conn.send(JSON.stringify({
                Auth:
                    {
                        User: user.value,
                        Channel: channel.value,
                        Token: token.value,
                        Name: name.value
                    }
            }));

            user.parentNode.removeChild(user);
            channel.parentNode.removeChild(channel);
            token.parentNode.removeChild(token);
        };

        conn.onmessage = function(e) {
            let data = JSON.parse(e.data);

            if (data.User === name.value)
            {

                box.innerHTML = box.innerHTML + getMessageFormat(data.Message);

            }
            else
            {

                box.innerHTML = box.innerHTML + getMessageFormat(data.Message, data.name);

            }
        };

        button.onclick = function() {
            conn.send(message.value);
        };

        $(document).ready(function() {



            $.get("/api/chat/getmessages", {channel: channel.value})
                .done(function( data ) {
                    alert( "Data Loaded: " + data );
                });
        });

</script>

</body>
</html>