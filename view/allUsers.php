<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Trombinoscope</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="container my-4 mx-8 px-4 md:px-12">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <?php
            foreach ($row as $allUsers){
                ?>
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-auto">
                    <article class="overflow-hidden rounded-lg shadow-lg">
                        <a href="user/<?php echo $allUsers['Id'] ?>">
                            <?php
                            if (isset($allUsers['Picture'])){
                                ?>
                                <img class="h-64 w-56" src="..\\storage\\users\\<?php echo $allUsers['Picture'] ?>">
                                <?php
                            } else {
                                ?>
                                <img class="h-64 w-64" src="..\\storage\\users\\noprofil.png">
                                <?php
                            }
                            ?>
                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <?php
                                    echo (
                                        (
                                            isset($allUsers['First_name'])
                                            && $allUsers['First_name'] <> ""
                                            && $allUsers['First_name'] <> NULL
                                        ) ? $allUsers['First_name'] : "-" );
                                    echo " - ";
                                    echo (
                                        (
                                            isset($allUsers['Last_name'])
                                            && $allUsers['Last_name'] <> ""
                                            && $allUsers['Last_name'] <> NULL
                                        ) ? $allUsers['Last_name'] : "-" );
                                    ?>
                                </h1>
                            </header>
                        </a>
                    </article>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </body>
</html>


