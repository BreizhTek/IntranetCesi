<?php ob_start(); ?>

<?php require_once __DIR__. "/userIntoChannel.php" ?>

<div class="bg-blue rounded-lg w-1/2 p-4">

    <div id="displayMessage" style="max-height: 500px;" class="bg-white rounded-lg p-4 overflow-auto">

        <?php echo $renderedMessages; ?>

    </div>

    <div class="mt-2 bg-white rounded-lg">

        <form method="post" action="api/send" class="flex flex-row justify-between">

            <div class="w-3/4 py-2 px-4">
                <input class="w-full appearance-none px-2 rounded-full" type="text" placeholder="Message" name="message">
                <input type="hidden" name="channel" value="<?= $channelId ?>">
            </div>

            <div class="w-1/4 py-2 px-4 bg-blue font-bold text-white">
                <button class="text-center w-full rounded-full">Valider</button>
            </div>


        </form>

    </div>

</div>

<?php
    $content = ob_get_clean();
    require_once('Default.php');
?>