<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        echo "dqsddqs";
        // require __DIR__ . '/views/404.php';
        break;
    case '' :
        echo "root";
        break;
    case '/about' :
        echo "about";
        break;
    case '/user' :
        require './view/user.php';
        break;
    default:
        http_response_code(404);
        echo "404";
        break;
}

