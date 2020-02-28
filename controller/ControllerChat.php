<?php

require_once "ressources/modele/ModelChat.php";

class ControllerChat {

    public function index(){

        $chat = new Chat();

        $channels = $chat->getChannels(2);

        require_once __DIR__ . "/../view/Chat/listChannels.php";

    }

    public function channel(){

        $chat = new Chat();

        $messages = $chat->getMessages();

        require __DIR__ . "/../view/Chat/message.php";

        require __DIR__ . "/../view/Chat/channel.php";

    }

    public function createChannel($name){

        $chat = new Chat();


        if($chat->channelExist($name) == false)
        {

            $chat->addChannel($name, 2);

        }
        else
        {
            $this->index();
            return false;
        }

        $this->index();
        return true;

    }

}