<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Cesi - Authentification</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="bg-orange-400 h-screen w-screen">
            <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
                <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
                    <div class="flex flex-col w-full md:w-1/2 p-4">
                        <div class="flex flex-col flex-1 justify-center mb-8">
                            <h1 class="text-4xl text-center font-thin">Welcome Back</h1>
                            <div class="w-full mt-4">
                                <form class="form-horizontal w-3/4 mx-auto" method="POST" action="login">
                                    <div class="flex flex-col mt-4">
                                        <input id="email" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="email" value="" placeholder="Email">
                                    </div>
                                    <div class="flex flex-col mt-4">
                                        <input id="password" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password" required placeholder="Password">
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <input type="checkbox" name="remember" id="remember" class="mr-2"> <label for="remember" class="text-sm text-grey-dark">Remember Me</label>
                                    </div>
                                    <div class="flex flex-col mt-8">
                                        <button type="submit" class="cursor-pointer bg-orange-500 hover:bg-orange-400 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <div class="text-center mt-4"> <!--{{ route('password.request') }}-->
                                    <a class="class="no-underline hover:underline text-blue-dark text-xs" href="#" href="#">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block md:w-1/2 rounded-r-lg" style="url('') ; background-size: cover; background-position: center center;"></div>
                </div>
            </div>
        </div>
    </body>
</html>

