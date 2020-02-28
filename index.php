<?php

session_start();
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
         require './controller/ControllerDeposit.php';
         $Deposit = new ControllerDeposit();
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
            elseif(isset($_GET['channel']) and $_GET['channel'] != null)
            {

                    $chat->channel($_GET['channel']);

            }
            else
            {
                $chat->index();
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
    /*case 'api' :

        if(!empty($request[1]) AND $request[1] == 'depo')
        {

            depo = new depo();

            switch ($request[2]) {
                case 'getStatus':
                    return json_encode(depo->getStatus());
                    break;
            }

        }

        break;*/


    case 'login' :
        require('controller/ControllerLogin.php');
        $login = new ControllerLogin();

        if (!empty($_POST)){
            $login->authentification();
        } else {
            $login->index();
        }
        break;

    default:
        http_response_code(404);
        abort();
        break;
}

