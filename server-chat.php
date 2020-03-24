<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use IntranetSocket\socketChat;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controller/SocketChat.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new socketChat()
        )
    ),
    8080
);

$server->run();