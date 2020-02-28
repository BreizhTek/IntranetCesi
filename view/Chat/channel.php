<?php ob_start(); ?>

<div class="bg-blue rounded-lg p-4 w-1/2">

    <div id="displayMessage" class="bg-white min-h-full rounded-lg p-4">

        <?php echo $renderedMessages; ?>

    </div>

    <div class="mt-2 bg-white rounded-lg">

        <form method="get" class="flex flex-row justify-between">

            <div class="w-3/4 py-2 px-4">
                <input class="w-full appearance-none px-2 rounded-full" type="text" placeholder="Message" name="channel">
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