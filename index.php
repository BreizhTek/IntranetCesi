<?php

session_start();

require __DIR__ . "/functions.php";
require __DIR__ . "/controller/ControllerChat.php";
require_once "./db.php";
require_once "./controller/api/ApiChat.php";

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

if (!$_SESSION OR empty($_SESSION) OR count($_SESSION) == 0)
{
    $request[0] = 'login';
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
        echo password_hash('123', PASSWORD_DEFAULT);
        break;
    case 'chat' :
        $chat = new ControllerChat();

        if (isset($_GET['channel']) AND !empty($_GET['channel']))
        {
            $chat->displayChannel($_GET['channel']);
        }
        else{
            $chat->displayChannelList();
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

        elseif(!empty($request[1]) AND $request[1] == 'chat')
        {
            $apiChat = new apiChat();

            if(!empty($_GET) AND isset($_GET['channel']) AND $_GET['channel'] != null AND $_SESSION)
            {

                if (isset($_GET['adduser']) AND $_GET['adduser'] != null)
                {
                    $apiChat->addUserToChannel($_GET['channel'], $_GET['adduser']);
                }
                else
                {
                    $apiChat->getMessages($_GET['channel']);
                }

            }
            else if(!empty($_GET) AND isset($_GET['createchannel']) AND $_GET['createchannel'] != null AND $_SESSION)
            {
                $apiChat->addChannel($_GET['createchannel']);
            }
            else if(!empty($_GET) AND isset($_GET['getuserslist']) AND $_GET['getuserslist'] != null AND $_SESSION)
            {
                $apiChat->getAllUsers($_GET['getuserslist']);
            }
            else if(!empty($_GET) AND isset($_GET['deletechannel']) AND $_GET['deletechannel'] != null AND $_SESSION)
            {
                $apiChat->deleteChannel($_GET['deletechannel']);
            }
            else if(!empty($_GET) AND isset($_GET['deleteuserfromchannel']) AND $_GET['deleteuserfromchannel'] != null AND isset($_GET['channelid']) AND $_GET['channelid'] != null AND $_SESSION)
            {
                $apiChat->deleteUserInChannel($_GET['channelid'],$_GET['deleteuserfromchannel']);
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
        abort();
        break;
}

