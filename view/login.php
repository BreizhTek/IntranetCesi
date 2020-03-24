<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Cesi - Authentification</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script
            src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
            integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
            crossorigin="anonymous"></script>
        <script src="ressources/js/rgpd.js"></script>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

    <div id="rgpd" class="fixed flex items-center justify-center h-screen"></div>
        <div class="bg-orange-400 h-screen w-screen">
            <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
                <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
                    <div class="flex flex-col w-full md:w-1/2 p-4">
                        <div class="flex flex-col flex-1 justify-center mb-8">
                            <h1 class="text-4xl text-center font-thin">Bienvenue</h1>
                            <div class="w-full mt-4">
                                <form class="form-horizontal w-3/4 mx-auto" method="POST" action="login">
                                    <div class="flex flex-col mt-4">
                                        <input id="email" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="email" value="" placeholder="Email">
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <input id="password" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password" required placeholder="Mot de passe">
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <p class="text-sm text-grey-dark text-white p-2 rounded-lg bg-orange-500 hover:bg-orange-400 cursor-pointer"><a href="/signin">S'inscrire</a></p>
                                    </div>
                                    <div class="flex flex-col mt-8">
                                        <button id="login" type="submit" class="cursor-pointer bg-grey-500 hover:bg-grey-400 shadow-xl px-5 py-2 inline-block text-black hover:text-white rounded" disabled >
                                            Se connecter
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block md:w-1/2 rounded-r-lg" style="url('') ; background-size: cover; background-position: center center;"></div>
                </div>
            </div>
        </div>
    </body>
</html>


