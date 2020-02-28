<?php


require __DIR__ . "/functions.php";
require __DIR__ . "/controller/ControllerChat.php";

$request = $_SERVER['REQUEST_URI'];

$request = substr($request, 1);
$request = explode('?', $request)[0];
$request = explode('/', $request);

function abort()
{
    echo "404";
}


switch ($request[0]) {
    case '/' :
        echo "dqsddqs";
        // require __DIR__ . '/views/404.php';
        break;
    case 'depo' :
         require 'controller/ControllerDeposit.php';
         $Deposit = new ControllerDeposit();
         $Deposit->index(); // Display deposit page
        break;
    case '' :
        echo "root";
        break;
    case 'chat' :

        $chat = new ControllerChat();

        if (empty($request[1])) {

            if (!empty($_POST)) {

                if (isset($_POST['newChannel']) and $_POST['newChannel'] != null)
                {

                    $chat->createChannel($_POST['newChannel']);

                }

            }
            else
            {

                if(isset($_GET['channel']))
                {
                    echo $_GET['channel'];
                }
                else
                {
                    $chat->index();
                }

            }

        }
        else
        {
            abort();
        }

        break;
    case 'user' :
        require 'controller/ControllerUser.php';
        if(isset($_POST['envoyerUpdate'])){
            $controllerUser = new ControllerUser();
            $controllerUser->update();
        }elseif (isset($_POST['envoyerInsert'])){
            $controllerUser = new ControllerUser();
            $controllerUser->insert();
        }else{
            $controllerUser = new ControllerUser();
            $controllerUser->index();
        }
        break;
    case 'allUser' :
        require 'controller/ControllerAllUser.php';
        $controllerAllUser = new ControllerAllUser();
        $controllerAllUser->index();
        break;
    case 'api' :

        if(!empty($request[1]) AND $request[1] == 'upload')
        {
            require 'controller/ControllerDeposit.php';
            $Deposit = new ControllerDeposit();
            $messageReturn = $Deposit->upload();
            echo  json_encode("ok");
        }

        break;


    default:
        http_response_code(404);
        abort();
        break;
}

