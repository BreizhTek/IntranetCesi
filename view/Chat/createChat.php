<?php ob_start(); ?>
<div class="border-gray-700 bg-gray-500 border-2 rounded-lg p-12">

    <form>

        <div>

            <label for="channelName">Nom du channel : </label>
            <input class="rounded-full px-2" type="text" name="channelName">

        </div>

        <div class="flex justify-end mt-4">

            <input class="rounded-full px-4 cursor-pointer appearance-none bg-black text-white" type="submit" value="Créer">

        </div>

    </form>

</div>

<?php
        $content = ob_get_clean();

        require ('Default.php');
?>
