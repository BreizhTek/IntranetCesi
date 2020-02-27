<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../autre/fontello/css/fontello.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/gsap.min.js"></script>
    <script src="../js/animation.js"></script>
    <title>Intranet CESI</title>
</head>
<body class="lg:overflow-visible min-h-screen flex flex-col">

    <?php require_once('./ressources/composants/header.php') ?>

    <main class="flex flex-grow">

        <div class="flex justify-center items-center w-full">

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

        </div>

    </main>

</body>
</html>