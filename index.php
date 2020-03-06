<?php

session_start();

require __DIR__ . "/functions.php";
require __DIR__ . "/controller/ControllerChat.php";
require __DIR__ . "/ressources/modele/ModelSocketAuthorization.php";

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
        echo password_hash('123', PASSWORD_DEFAULT);
        break;
    case 'test' :
        $socket = new socketAuthorization();

        $result = $socket->addAuthorization(1);
        $data = $socket->getAuth(1);

        $Token = $data['Token'];
        $Channel = $data['Id_Channels'];
        $User = $_SESSION['User_ID'];
        $Name = $_SESSION['First_name'];


        require_once "view/Chat/room.php";

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
    case 'api' :

        $chat = new ControllerChat();

        if(!empty($request[1]) AND $request[1] == 'upload')
        {
            require 'controller/ControllerDeposit.php';
            $Deposit = new ControllerDeposit();
            $messageReturn = $Deposit->upload();
            echo  json_encode("ok");
        }
        elseif(!empty($request[1]) AND $request[1] == 'chat')
        {

            if(!empty($_POST) AND isset($_POST['message']) AND $_POST['message'] != null AND isset($_POST['channel']) AND $_POST['channel'] != null)
            {

                $chat->sendMessage($_POST['channel'], $_POST['message']);

                header('Location: /chat?channel=' . $_POST['channel']);
                exit();

            }

        }
        elseif(!empty($request[1]) AND $request[1] == 'adduserintochannel')
        {

            if(!empty($_POST) AND isset($_POST['newMember']) AND $_POST['newMember'] != null AND isset($_POST['channel']) AND $_POST['channel'] != null)
            {

                $chat->addUserToChannel($_POST['channel'], $_POST['newMember']);

            }

        }

        break;



    case 'login' :
        require('controller/ControllerLogin.php');
        $login = new ControllerLogin();

        if (!empty($_POST)){
            $login->authentification();
        } else {
            $login->index();
        }
        break;

    case 'logout' :
        session_destroy();
        header('Location: /login');
        exit();
        break;

    default:
        http_response_code(404);
        abort();
        break;
}

