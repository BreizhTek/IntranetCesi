<?php

define('DSN', 'mysql:host=localhost;dbname=Intranet');
define('USER', 'root');
define('PASS', '');

class Chat {

    private function connect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=Intranet','root','root');
        }
        catch(PDOException $e)
        {
            error_log($e->getMessage());
            return false;
        }

        return $db;
    }

    public function getChannels()
    {

        $request = $this->connect()->prepare("SELECT CHA.Id, CHA.Name FROM Channels AS CHA
                                                        INNER JOIN Users AS U
                                                        INNER JOIN Channel_users AS CHAU ON CHAU.Id_Users = U.Id AND CHAU.Id = CHA.Id
                                                        WHERE U.Id = :userid;");

        $request->bindValue(':userid', $_SESSION['User_ID']);
        $request->execute();

        return $request->fetchAll();

    }

    public function sendMessage($channelId, $message)
    {

        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');

        $request = $this->connect()->prepare("INSERT INTO Messages (Content, Date) VALUES (:message, :date)");

        $request->bindValue(':message', $message);

        $request->bindValue(':date', $date);

        $request->execute();

        $request = $this->connect()->prepare("SELECT Id FROM Messages WHERE Content = :message AND Date = :date");

        $request->bindValue(':message', $message);

        $request->bindValue(':date', $date);

        $request->execute();

        $messageId = $request->fetch()['Id'];

        $request = $this->connect()->prepare("INSERT INTO Discussion (Id, Id_Channels, Id_Messages) VALUES (:userId, :channelId, :messageId)");

        $request->bindValue(':userId', $_SESSION['User_ID']);

        $request->bindValue('channelId', $channelId);

        $request->bindValue('messageId', $messageId);

        $request->execute();
    }

    public function getMessages($channelId)
    {

        if (!$this->channelExist($this->getChannelName($channelId)))
            return false;


        if (!$this->grantedToShowThisChannel($channelId))
            return false;


        $request = $this->connect()->prepare("SELECT U.Id, U.First_name, M.Content, M.Date FROM Discussion AS D
                                                        INNER JOIN Users AS U ON U.Id = D.Id
                                                        INNER JOIN Messages AS M ON M.Id = D.Id_Messages
                                                        WHERE Id_Channels = :channelId
                                                        ORDER BY M.Id DESC LIMIT 10");

        $request->bindValue(':channelId', $channelId);

        $request->execute();

        return array_reverse($request->fetchAll());

    }

    public function grantedToShowThisChannel($channelId)
    {

        $request = $this->connect()->prepare("SELECT * FROM Channel_users WHERE Id = :channelId AND Id_Users = :userid");

        $request->bindValue('channelId', $channelId);

        $request->bindValue('userid', $_SESSION['User_ID']);

        $request->execute();

        if (!empty($request->fetch()))
        {
            return true;
        }

        return false;
    }

    public function channelExist($name)
    {

        $request = $this->connect()->prepare("SELECT * FROM Channels WHERE Name = :name");

        $request->bindValue(':name', $name);

        $request->execute();

        if (empty($request->fetchAll()))
        {
            return false;
        }

        return true;

    }

    public function addChannel($name, $userid){

        $request = $this->connect()->prepare("INSERT INTO Channels (Name, Id_Users) VALUES (:name, :iduser)");

        $request->bindValue(':name', $name);
        $request->bindValue(':iduser', $userid);

        $request->execute();

        $this->addUserToAChannel($name, $userid);

        return true;
    }

    public function getChannelId($name)
    {

        $request = $this->connect()->prepare("SELECT Id FROM Channels WHERE Name = :name");

        $request->bindValue(':name', $name);

        $request->execute();

        $Id = $request->fetch();

       if (!empty($Id))
       {
           return $Id['Id'];
       }
       else
       {
           return false;
       }

    }

    public function addUserToAChannel($channelName, $userId)
    {

        $request = $this->connect()->prepare("INSERT INTO Channel_users (Id, Id_Users) VALUES (:id, :iduser)");

        $channelId = $this->getChannelId($channelName);

        $request->bindValue(':id', $channelId);

        $request->bindValue('iduser', $userId);

        $request->execute();

        return true;

    }

}