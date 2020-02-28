<?php

$request = $_SERVER['REQUEST_URI'];

$request = substr($request, 1);
$request = explode('?', $request)[0];
$request = explode('/', $request);


var_dump($request);
function abort()
{
    echo "404";
}


switch ($request[0]) {
    case '/' :
        echo "dqsddqs";
        // require __DIR__ . '/views/404.php';
        break;
    case '/depo' :
         require './controller/ControllerDeposit.php';
        break;
    case '' :
        echo "root";
        break;
    case 'chat' :

        require('controller/ControllerChat.php');

        $chat = new ControllerChat();

        if(!empty($request[1]) AND $request[1] == "createchannel")
        {

            if (isset($_POST['channelName']) AND !empty($_POST['channelName']))
            {


                return true; //Create channel

            }
            else{

                $chat->createChannel();

            }



        }
        elseif (empty($request[1])) {

            if (!empty($_POST)) {

                echo "post";

            }
            else
            {
                var_dump($_GET);

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
    default:
        http_response_code(404);
        abort();
        break;
}

