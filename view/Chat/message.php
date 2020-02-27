<?php ob_start(); ?>

<div class="flex flex-row my-4">

    <div class="w-1/12">
        <p><?php echo $Item['Id'] ?></p>
    </div>

    <div>
        <p><?php echo $Item['Content'] ?></p>
    </div>

</div>

<?php $message = ob_get_clean(); ?>
