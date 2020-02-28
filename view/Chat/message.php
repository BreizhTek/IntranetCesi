<?php ob_start(); ?>

<?php
foreach ($messages as $Item) {?>

    <?php if($Item['Id'] != $_SESSION['Id']) { ?>

        <div class="flex flex-row my-4">

            <div class="px-4 mr-10 text-red-700 font-bold border-r border-blue w-1/6">
                <p><?php echo $Item['First_name'] ?></p>
            </div>

            <div class="px-4 py-2 bg-blue text-white rounded-full">
                <p><?php echo $Item['Content'] ?></p>
            </div>

        </div>


        <?php } ?>
<?php } ?>


<?php $renderedMessages = ob_get_clean(); ?>
