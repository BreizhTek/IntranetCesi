<?php

require_once "ressources/modele/ModelChat.php";

class ControllerChat {

    public function index(){

        $chat = new Chat();

        $messages = $chat->getMessages();
        $allMessage = "";

        foreach ($messages as $Item)
        {
            require "./view/Chat/message.php";
            $allMessage = $allMessage . $message;
        }

        require "./view/Chat/index.php";

    }

    public static function createChannel(){

        require "./view/Chat/createChat.php";

    }

}