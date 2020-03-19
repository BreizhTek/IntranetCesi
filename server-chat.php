<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use IntranetSocket\socketChat;

require dirname(__DIR__) . '/IntranetCesi/vendor/autoload.php';
require dirname(__DIR__) . '/IntranetCesi/controller/SocketChat.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new socketChat()
        )
    ),
    8080
);

$server->run();