<?php

$request = $_SERVER['REQUEST_URI'];
$req = explode("/", $request);

switch ("/".$req["1"]) {
    case '/' :
        echo "dqsddqs";
        // require __DIR__ . '/views/404.php';
        break;
    case '' :
        echo "root";
        break;
    case '/chat' :

        require('controller/ControllerChat.php');

        $chat = new ControllerChat();

        if (!empty($_POST))
        {
            echo "post";
        }
        else
        {
            $chat->index();
        }

        break;
    case '/db' :
        require './db.php';
        break;
    case '/user' :
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
    case '/allUser' :
        require 'controller/ControllerAllUser.php';
        $controllerAllUser = new ControllerAllUser();
        $controllerAllUser->index();
        break;
    default:
        http_response_code(404);
        echo "404";
        break;
}

