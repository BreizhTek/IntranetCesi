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

    <title><?php echo $ChannelName; ?></title>
</head>
<body>

<input type="hidden" value="<?php echo $User; ?>" id="User">
<input type="hidden" value="<?php echo $Channel; ?>" id="Channel">
<input type="hidden" value="<?php echo $Token; ?>" id="Token">
<input type="hidden" value="<?php echo $Name; ?>" id="Name">

<div class="w-full min-h-screen flex flex-row justify-center items-center">

    <div class="w-full lg:flex lg:flex-row lg:mx-2 xl:mx-0 justify-center">

        <div class="bg-blue p-2 lg:w-2/3 xl:w-1/2 lg:p-4 xl:p-8 rounded-lg">

            <div class="flex justify-center pb-2 font-extrabold text-xl text-white">
                <h1><?php echo $ChannelName; ?></h1>
            </div>

            <div id="displayMessages" style="height: 450px;" class="w-full bg-white rounded-lg overflow-y-scroll">
            </div>

            <form onsubmit="eventSendMessage();return false" id="formMessage" class="w-full flex flex-row p-4">
                <input type="text" required id="inputMessage" class="w-3/4 mr-4 px-4 rounded-full">
                <input type="submit" value="Envoyer" class="w-1/4 py-2 appearance-none hover:bg-white rounded-full cursor-pointer">
            </form>

        </div>

        <div class="h-full text-white">

            <div class="my-4 lg:mt-0 lg:ml-8 bg-blue p-8 rounded-lg">
                <h3 class="font-bold pb-2">Utilisateurs :</h3>

                <div id="usersList" style="max-height: 200px;" class="overflow-y-scroll bg-white text-black p-2 rounded-lg">
                </div>

            </div>

            <div class="mt-4 lg:mt-0 lg:ml-8 bg-blue p-8 rounded-lg">
                <h3 class="font-bold">Ajouter un utilisateur</h3>

                <div class="mt-2">

                    <input type="text" class="rounded-full px-2 text-black" id="inputNewUser" placeholder="E-mail"/>
                    <button onclick="addNewUser()" class="ml-2 bg-white rounded-lg text-black p-1 px-2">Ajouter</button>

                    <div id="responseAddUser" class="font-bold text-red-400"></div>

                </div>
            </div>

            <?php if ($channelOwner) { ?>

            <div class="mt-4 lg:ml-8 bg-blue p-4 rounded-lg">

                <button onclick="deleteChannel()" class="text-red-400">Supprimer le channel</button>

            </div>

            <?php } ?>

        </div>



    </div>

</div>

<script>

        let conn = new WebSocket('ws://localhost:8080');
        let message = document.getElementById('inputMessage');
        let box = document.getElementById('displayMessages');

        let user = document.getElementById('User');
        let channel = document.getElementById('Channel');
        let token = document.getElementById('Token');
        let name = document.getElementById('Name');

        function getMessageFormat(message, name)
        {

            if (message && name)
            {

                return '<div class="w-full p-2 flex flex-row">'
                    + '<p class="flex items-center font-bold">' + name + '</p>'
                    + '<p class="ml-4 bg-blue p-2 rounded-lg text-white">' + message + '</p>'
                    + '</div>';

            }
            else
            {

                return '<div class="w-full p-2 flex flex-row justify-end">'
                + '<p class="ml-4 bg-blue p-2 rounded-lg text-white">' + message + '</p>'
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
            name.parentNode.removeChild(name);
        };

        conn.onmessage = function(e) {

            let data = JSON.parse(e.data);

            if (data.message === "Erreur")
            {
                console.log('Erreur');
                return false;
            }

            if (data.User === name.value)
            {
                box.innerHTML = box.innerHTML + getMessageFormat(data.Message);
            }
            else
            {
                box.innerHTML = box.innerHTML + getMessageFormat(data.Message, data.User);
            }

            scrollBottom();
        };

        $(document).ready(function() {

            getUsers();

            $.get("/api/chat/", {channel: channel.value})
                .done(function( data ) {

                    for (let i=0; i < data.length; i++)
                    {

                        if (data[i].First_name === name.value)
                        {

                            box.innerHTML = box.innerHTML + getMessageFormat(data[i].Content);

                        }
                        else
                        {

                            box.innerHTML = box.innerHTML + getMessageFormat(data[i].Content, data[i].First_name);

                        }

                    }

                    scrollBottom();

                });

        });

        function deleteChannel()
        {
            $.get("/api/chat/", {deletechannel: channel.value})
                .done(function () {
                    window.location.href = "/chat";
                })

        }

        function getUsers()
        {
            let usersList = document.getElementById('usersList');

            usersList.innerHTML = "";

            $.get('/api/chat/', {getuserslist: channel.value})
                .done(function(data)
                {
                    for (let i=0; i<data.content.length;i++)
                    {
                        if (data.owner)
                        {
                            usersList.innerHTML = usersList.innerHTML + '<div class="flex flex-row justify-between my-2"><p class="text-sm">' + data.content[i].First_name + ' ' + data.content[i].Last_name + '</p><button onclick="deleteUser(' + channel.value + ',' + data.content[i].Id + ')" class="bg-red-500 px-2 rounded-full font-extrabold">-</button></div>';
                        }
                        else
                        {
                            usersList.innerHTML = usersList.innerHTML + '<p class="text-sm my-2">' + data.content[i].First_name + ' ' + data.content[i].Last_name + '</p>';
                        }
                    }
                })
        }

        function deleteUser(channelId, userId)
        {
            $.get("/api/chat/", {deleteuserfromchannel: userId, channelid: channelId})
                .done(function(){
                    getUsers();
                })
        }

        function eventSendMessage()
        {

            conn.send(message.value);
            message.value = "";

            return false;

        }

        function scrollBottom()
        {
            let messageBox = $('#displayMessages');

            messageBox.scrollTop(1e4);

        }

        function addNewUser()
        {
            let newUser = document.getElementById('inputNewUser');
            let response = document.getElementById('responseAddUser');

            $.get("/api/chat/", {channel: channel.value, adduser: newUser.value})
                .done(function( data ) {

                    response.innerHTML = "";

                    if (data.message === 'ok')
                    {
                        response.append("Utilisateur ajouté !");
                        newUser.value = "";
                        getUsers();
                    }
                    else
                    {
                        response.append("Utilisateur non trouvé !");
                    }

                });

        }

</script>

</body>
</html>