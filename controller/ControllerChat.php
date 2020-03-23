<?php

require_once "ressources/modele/ModelChat.php";

class ControllerChat {

    private $chat;

    public function __construct()
    {
        $this->chat = new Chat();
    }

    public function getChannelList(){

        return $this->chat->getChannels();

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

    public function isAllowed($channelId)
    {
        return $this->chat->grantedToShowThisChannel($channelId);
    }

    public function sendMessage($channelId, $message)
    {

        $this->chat->sendMessage($channelId, $message);

    }

    public function thisChannelExist($id)
    {
        return $this->chat->getChannelName($id);
    }

    public function createChannel($name){

        if($this->chat->channelExist($name) == false)
        {

            $this->chat->addChannel($name);

        }
        else
        {
            return false;
        }

        return true;

    }

    public function getChannelName($channelId)
    {

        if ($this->chat->grantedToShowThisChannel($channelId))
        {
            return $this->chat->getChannelName($channelId);
        }

        return false;
    }
    public function getChannelId($channelName)
    {

        return $this->getChannelId($channelName);

    }

    public function addUserToChannel($channelId, $userMail)
    {
        http_response_code(200);
        header('Content-Type: application/json');

        if($this->chat->grantedToShowThisChannel($channelId))
        {
            $channelName = $this->chat->getChannelName($channelId);

            if($userId = $this->chat->getUserIdByMail($userMail))
            {
                $this->chat->addUserToAChannel($channelName, $userId);

                echo json_encode(array(
                    'message' => 'ok',
                ));

                return true;
            }
        }

        echo json_encode(array(
            'message' => 'error'
        ));
    }

}