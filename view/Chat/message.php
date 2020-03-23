<?php ob_start(); ?>

<?php

$last = "";

foreach ($messages as $Item) {?>

    <?php if($Item['Id'] != $_SESSION['User_ID']) { ?>

        <div class="flex flex-row my-4">

            <div class="px-4 mr-10 text-red-700 font-bold border-r border-blue w-1/6">
            <?php if($last != $Item['Id']) { ?>
                <p><?php echo $Item['First_name'] ?></p>
            <?php } ?>
            </div>

            <div class="px-4 py-2 bg-blue text-white rounded-full">
                <p><?php echo $Item['Content'] ?></p>
            </div>

        </div>


        <?php } else { ?>

        <div class="flex flex-row my-4 justify-end">

            <div class="px-4 py-2 bg-blue text-white rounded-full">
                <p><?php echo $Item['Content'] ?></p>
            </div>

        </div>

        <?php } ?>
<?php
$last = $Item['Id'];
} ?>


<?php $renderedMessages = ob_get_clean(); ?>
