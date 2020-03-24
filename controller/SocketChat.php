<?php
namespace IntranetSocket;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../ressources/modele/ModelSocketAuthorization.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;

class socketChat implements MessageComponentInterface {

    protected $client;
    private $sessions;
    private $model;
    private $channels;

    public function __construct()
    {
        $this->client = new \SplObjectStorage;
        $this->model = new \socketAuthorization();
        $this->channels = array();
        $this->sessions = array();
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->client->attach($conn);
    }

    public function onClose(ConnectionInterface $conn)
    {

        $channelId = $this->sessions[$conn->resourceId]['Channel'];
        $userId = $this->sessions[$conn->resourceId]['User'];

        unset($this->channels[$channelId][$userId]);
        unset($this->sessions[$conn->resourceId]);

        $this->client->detach($conn);

    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {

        $channelId = $this->sessions[$conn->resourceId]['Channel'];
        $userId = $this->sessions[$conn->resourceId]['User'];

        unset($this->channels[$channelId][$userId]);
        unset($this->sessions[$conn->resourceId]);

        $conn->close();

    }

    public function onMessage(ConnectionInterface $from, $msg)
    {

        if (!array_key_exists($from->resourceId, $this->sessions))
        {

            $msg = json_decode($msg, true);

            $User = $msg['Auth']['User'];
            $UserName = $msg['Auth']['Name'];
            $Channel = $msg['Auth']['Channel'];
            $Token = $msg['Auth']['Token'];

            if (empty($User) OR empty($Channel) OR empty($Token))
            {

                $from->send(json_encode(array(
                    'message' => 'Erreur'
                )));
                $from->close();

            }
            elseif($this->model->isGranted($User, $Channel, $Token))
            {

                $this->sessions[$from->resourceId] = [
                    'User' => $User,
                    'UserName' => $UserName,
                    'Channel' => $Channel,
                    'Connection' => $from
                ];

                $channelId = $this->sessions[$from->resourceId]['Channel'];
                $userId = $this->sessions[$from->resourceId]['User'];
                $connection = $this->sessions[$from->resourceId]['Connection'];

                if (!array_key_exists($channelId, $this->channels))
                    $this->channels[$channelId] = array();


                $this->channels[$channelId][$userId] = $connection;

            }
            else
            {

                $from->send('Refused');
                $from->close();

            }


        }
        else
        {

            $channelId = $this->sessions[$from->resourceId]['Channel'];
            $userId = $this->sessions[$from->resourceId]['User'];
            $user = $this->sessions[$from->resourceId]['UserName'];

            $this->model->sendMessage($channelId, $msg, $userId);

            $finalMessage = array();
            $finalMessage['UserId'] = $userId;
            $finalMessage['User'] = $user;
            $finalMessage['Message'] = $msg;

            foreach ($this->channels[$channelId] as $client)
            {

                $client->send(json_encode($finalMessage));

            }

        }

    }


}