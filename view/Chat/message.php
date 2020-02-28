<?php ob_start(); ?>

<?php
foreach ($messages as $Item) {?>

<div class="flex flex-row my-4">

    <div class="px-4 mr-6 border-r border-blue">
        <p><?php echo $Item['First_name'] ?></p>
    </div>

    <div>
        <p><?php echo $Item['Content'] ?></p>
    </div>

</div>

<?php } ?>


<?php $renderedMessages = ob_get_clean(); ?>
