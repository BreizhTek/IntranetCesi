<?php

require_once "ressources/modele/ModelChat.php";

class ControllerChat {

    private $chat;

    public function __construct()
    {
        $this->chat = new Chat();
    }

    public function index(){

        var_dump($_SESSION);

        $channels = $this->chat->getChannels();

        require_once __DIR__ . "/../view/Chat/listChannels.php";

    }

    public function channel($channelId){

        $messages = $this->chat->getMessages($channelId);

        if ($messages === false)
            $this->index();

        require __DIR__ . "/../view/Chat/message.php";

        require __DIR__ . "/../view/Chat/channel.php";

    }

    public function getMessages($channelId)
    {

        if($this->chat->grantedToShowThisChannel($channelId))
        {

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($this->chat->getMessages($channelId));

        }
        else
        {

            http_response_code(404);

        }

    }

    public function sendMessage($channelId, $message)
    {

        $this->chat->sendMessage($channelId, $message);

    }

    public function createChannel($name){

        if($this->chat->channelExist($name) == false)
        {

            $this->chat->addChannel($name);

        }
        else
        {
            $this->index();
            return false;
        }

        $this->index();
        return true;

    }

    public function addUserToChannel($channelId, $userMail)
    {

        $channelName = $this->chat->getChannelName($channelId);

        $userId = $this->chat->getUserIdByMail($userMail);

        $this->chat->addUserToAChannel($channelName, $userId);

    }

}