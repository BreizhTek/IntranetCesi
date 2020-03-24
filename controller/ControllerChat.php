<?php

require_once "ressources/modele/ModelChat.php";
require_once "ressources/modele/ModelSocketAuthorization.php";

class ControllerChat {

    private $chat;
    private $socket;

    public function __construct()
    {
        $this->chat = new Chat();
        $this->socket = new socketAuthorization();
    }

    public function getChannelList(){

        return $this->chat->getChannels();

    }

    public function isAllowed($channelId)
    {
        return $this->chat->grantedToShowThisChannel($channelId);
    }

    public function thisChannelExist($id)
    {
        return $this->chat->getChannelName($id);
    }

    public function displayChannel($channelId)
    {

        if($this->chat->channelExist($this->chat->getChannelName($channelId)) AND $this->chat->grantedToShowThisChannel($channelId))
        {
            $result = $this->socket->addAuthorization($channelId);
            $data = $this->socket->getAuth($channelId);

            $Token = $data['Token'];
            $Channel = $data['Id_Channels'];
            $User = $_SESSION['User_ID'];
            $Name = $_SESSION['First_name'];
            $ChannelName = $this->chat->getChannelName($Channel);
            $channelOwner = $this->chat->isChannelOwner($Channel);
            require_once "view/Chat/room.php";
        }
        else
        {
            http_response_code(404);
            echo "404";
            exit();
        }

    }

    public function displayChannelList()
    {
        $channels = $this->chat->getChannels();

        require_once "view/Chat/list.php";

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

        return $this->chat->getChannelId($channelName);

    }

}