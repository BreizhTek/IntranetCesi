<?php ob_start(); ?>

<?php
foreach ($messages as $Item) {?>

<div class="flex flex-row my-4">

    <div class="w-1/12">
        <p><?php echo $Item['Id'] ?></p>
    </div>

    <div>
        <p><?php echo $Item['Content'] ?></p>
    </div>

</div>

<?php } ?>


<?php $rendered = ob_get_clean(); ?>
