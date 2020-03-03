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


        conn.onopen = function(e) {
            console.log("Connection established!");

            let user = document.getElementById('User');
            let channel = document.getElementById('Channel');
            let token = document.getElementById('Token');
            let name = document.getElementById('Name');

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
            console.log(e.data);

            let data = JSON.parse(e.data);

            box.innerHTML = box.innerHTML + '<p class="w-full text-center">' + data.User + ' : ' + data.Message + '</p>';
        };

        console.log(box.innerHTML);

        button.onclick = function() {
            conn.send(message.value);
        };

</script>

</body>
</html>