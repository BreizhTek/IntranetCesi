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
    http_response_code(404);
    echo "404";
    exit();
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
    case 'chat' :
        $socket = new socketAuthorization();
        $chat = new ControllerChat();

        if (isset($_GET['channel']) AND !empty($_GET['channel']))
        {

            if($chat->thisChannelExist($_GET['channel']) AND $chat->isAllowed($_GET['channel']))
            {
                $result = $socket->addAuthorization($_GET['channel']);
                $data = $socket->getAuth($_GET['channel']);

                $Token = $data['Token'];
                $Channel = $data['Id_Channels'];
                $User = $_SESSION['User_ID'];
                $Name = $_SESSION['First_name'];
                $ChannelName = $chat->getChannelName($Channel);
                require_once "view/Chat/room.php";
            }
            else
            {
                abort();
            }

        }

        $channels = $chat->getChannelList();

        require_once "view/Chat/list.php";

        break;
    /*case 'chat' :

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

        break;*/
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

        if(!empty($request[1]) AND $request[1] == 'Upload')
        {
            require 'controller/ControllerDeposit.php';
            $Deposit = new ControllerDeposit();
            echo  $Deposit->upload();
        }

        elseif(!empty($request[1]) AND $request[1] == 'fileDisplay')
        {
            require 'controller/ControllerDeposit.php';
            $Deposit = new ControllerDeposit();
            echo  $Deposit->display();
        }

        elseif(!empty($request[1]) AND $request[1] == 'folderCreation')
        {
            require 'controller/ControllerDeposit.php';
            $Deposit = new ControllerDeposit();
            echo $Deposit->folderCreation($_POST['name'], $_POST['path']);
        }

        elseif(!empty($request[1]) AND $request[1] == 'chat')
        {

            if(!empty($_GET) AND isset($_GET['channel']) AND $_GET['channel'] != null AND $_SESSION)
            {

                if (isset($_GET['adduser']) AND $_GET['adduser'] != null)
                {
                    $chat->addUserToChannel($_GET['channel'], $_GET['adduser']);
                }
                else
                {
                    $chat->getMessages($_GET['channel']);
                }

            }
            else if(!empty($_GET) AND isset($_GET['createchannel']) AND $_GET['createchannel'] != null AND $_SESSION)
            {

                if ($chat->createChannel($_GET['createchannel']))
                {
                    http_response_code(200);
                    echo json_encode(array(
                        'channel' => $chat->getChannelId($_GET['createchannel'])
                    ));
                }
                else
                {
                    http_response_code(404);
                }

            }
            else
            {
                abort();
            }

        }

        else
        {
            abort();
        }

        elseif(!empty($request[1]) AND $request[1] == 'sign')
        {
            require 'controller/ControllerSignature.php';
            $sign = new ControllerSignature();
            echo $sign->sign();
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

    case 'signature' :
        require 'controller/ControllerSignature.php';
        $signature = new ControllerSignature();
        $signature->index(); // Display pop up to make the electronic signature
        break;

    default:
        abort();
        break;
}

