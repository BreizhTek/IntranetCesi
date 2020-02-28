<?php ob_start(); ?>

    <div class=" bg-blue rounded-lg p-4 w-1/2">

        <div class="flex justify-center mb-4 font-bold text-2xl text-white">
            <h1>Liste de vos channels :</h1>
        </div>

        <div class="bg-white min-h-full rounded-lg p-4">
            
            <?php foreach ($channels as $channel) { ?>

                <form method="get" action="chat" class="w-full border-b-2 border-black my-2 flex flex-row justify-between p-2">
                    <p class="font-bold"><?php echo $channel['Name'] ?></p>
                    <input type="hidden" name="channel" value="<?php echo $channel['Id'] ?>">
                    <input class="cursor-pointer appearance-none bg-blue px-2 font-bold text-white" type="submit" value="Rejoindre">
                </form>

            <?php } ?>

        </div>

        <div class="mt-4 bg-white rounded-lg p-8">

            <h2 class="mb-4 font-bold text-xl">Creation de channel</h2>

            <form method="post" action="chat" class="flex flex-row justify-center py-4">

                <div class="flex flex-row justify-between items-center w-full">

                    <div class="flex flex-row items-center">

                        <label for="channelName">Nom du channel : </label>
                        <input class="rounded-full px-2 bg-gray-500 ml-4" type="text" name="newChannel">

                    </div>


                    <input class="rounded-full px-4 cursor-pointer appearance-none bg-blue font-bold text-white" type="submit" value="Créer">

                </div>


            </form>

        </div>

    </div>

<?php
$content = ob_get_clean();
require_once('Default.php');
?>