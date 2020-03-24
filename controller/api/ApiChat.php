<?php


class apiChat
{

    private $modelChat;

    public function __construct()
    {
        $this->modelChat = new Chat();
    }

    public function addChannel($channelName)
    {
        if ($this->createChannel($channelName))
        {
            http_response_code(200);
            echo json_encode(array(
                'channel' => $this->modelChat->getChannelId($_GET['createchannel'])
            ));
        }
        else
        {
            http_response_code(404);
        }
    }

    public function addUserToChannel($channelId, $userMail)
    {
        http_response_code(200);
        header('Content-Type: application/json');

        if($this->modelChat->grantedToShowThisChannel($channelId))
        {
            $channelName = $this->modelChat->getChannelName($channelId);
            if($userId = $this->modelChat->getUserIdByMail($userMail))
            {
                $this->modelChat->addUserToAChannel($channelName, $userId);
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

    private function createChannel($name){
        if($this->modelChat->channelExist($name) == false)
        {
            $this->modelChat->addChannel($name);
        }
        else
        {
            return false;
        }
        return true;
    }

    public function getMessages($channelId)
    {
        if($this->modelChat->grantedToShowThisChannel($channelId))
        {
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($this->modelChat->getMessages($channelId));
        }
        else
        {
            http_response_code(404);
            exit();
        }
    }

    public function getAllUsers($channelId)
    {

        if ($this->modelChat->grantedToShowThisChannel($channelId))
        {
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode(array(
                'owner' => $this->modelChat->isChannelOwner($channelId),
                'content' => $this->modelChat->getUsersIntoChannel($channelId)
            ));
        }
        else
        {
            http_response_code(404);
            exit();
        }

    }

    public function deleteUserInChannel($channelId, $userId)
    {
        if ($this->modelChat->isChannelOwner($channelId))
        {
            $this->modelChat->deleteUserFromChannel($channelId, $userId);
            http_response_code(200);
        }
        else
        {
            http_response_code(404);
            exit();
        }
    }

    public function deleteChannel($channelId)
    {

        if ($this->modelChat->isChannelOwner($channelId))
        {
            $this->modelChat->deleteChannel($channelId);
            http_response_code(200);
        }
        else
        {
            http_response_code(404);
            exit();
        }

    }

}
