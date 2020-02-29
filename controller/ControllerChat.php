<?php

require_once "ressources/modele/ModelChat.php";

class ControllerChat {

    public function index(){

        $chat = new Chat();

        var_dump($_SESSION);

        $channels = $chat->getChannels();

        require_once __DIR__ . "/../view/Chat/listChannels.php";

    }

    public function channel($channelId){

        $chat = new Chat();

        $messages = $chat->getMessages($channelId);

        if ($messages === false)
            $this->index();

        require __DIR__ . "/../view/Chat/message.php";

        require __DIR__ . "/../view/Chat/channel.php";

    }

    public function sendMessage($channelId, $message)
    {

        $chat = new Chat();

        $chat->sendMessage($channelId, $message);

    }

    public function createChannel($name){

        $chat = new Chat();


        if($chat->channelExist($name) == false)
        {

            $chat->addChannel($name);

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

        $chat = new Chat();

        $channelName = $chat->getChannelName($channelId);

        $userId = $chat->getUserIdByMail($userMail);

        $chat->addUserToAChannel($channelName, $userId);

    }

}