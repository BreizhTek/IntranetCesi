<?php
session_start();
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
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
    case '/user' :
        require './view/user.php';
        break;
        
    case '/login' :
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
        echo "404";
        break;
}

