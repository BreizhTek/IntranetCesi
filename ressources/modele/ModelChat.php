<?php

class Chat {


    private function connect()
    {
        try
        {
            $db = new PDO(DSN,USER,PASS);
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
                                                        ORDER BY M.Id DESC LIMIT 50");

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

    public function addChannel($name){

        $request = $this->connect()->prepare("INSERT INTO Channels (Name, Id_Users) VALUES (:name, :iduser)");

        $request->bindValue(':name', $name);
        $request->bindValue(':iduser', $_SESSION['User_ID']);

        $request->execute();

        $this->addUserToAChannel($name, $_SESSION['User_ID']);

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

    public function getChannelName($channelId)
    {

        $request = $this->connect()->prepare("SELECT Name FROM Channels WHERE Id = :id");

        $request->bindValue(':id', $channelId);

        $request->execute();

        $Name = $request->fetch();

        if (!empty($Name))
        {
            return $Name['Name'];
        }
        else
        {
            return false;
        }

    }

    public function getUserIdByMail($userMail)
    {

        $request = $this->connect()->prepare("SELECT Id FROM Users WHERE Mail = :mail");

        $request->bindValue(':mail', $userMail);

        $request->execute();

        return $request->fetch()['Id'];

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

    public function isChannelOwner($channel)
    {

        $request = $this->connect()->prepare("SELECT Id FROM Channels WHERE Id_Users = :userId AND Id = :channelId");

        $request->bindValue(':userId', $_SESSION['User_ID']);
        $request->bindValue(':channelId', $channel);

        $request->execute();

        if (!empty($request->fetch()))
            return true;

        return false;
    }

    public function deleteChannel($channelId)
    {
        $this->deleteAllUsersInChannel($channelId);

        $request = $this->connect()->prepare("DELETE FROM Channels WHERE Id = :channelId");

        $request->bindValue(':channelId', $channelId);

        $request->execute();

        return true;
    }

    public function deleteMessage($messageId)
    {

        $request = $this->connect()->prepare("DELETE FROM Discussion WHERE Id_Messages = :messageId");

        $request->bindValue(':messageId', $messageId);

        $request->execute();

        $request = $this->connect()->prepare("DELETE FROM Messages WHERE Id = :messageId");

        $request->bindValue(':messageId', $messageId);

        $request->execute();

        return true;
    }

    private function deleteAllUsersInChannel($channelId)
    {

        $request = $this->connect()->prepare("DELETE FROM Channel_users WHERE Id = :channelId");

        $request->bindValue(':channelId', $channelId);

        $request->execute();

        $request = $this->connect()->prepare("DELETE FROM Socket WHERE Id_Channels = :channelId");

        $request->bindValue(':channelId', $channelId);

        $request->execute();

        return true;
    }

    public function deleteUserFromChannel($channelId, $userId)
    {
        $request = $this->connect()->prepare("DELETE FROM Channel_users WHERE Id = :channelId AND Id_Users = :userId");

        $request->bindValue(':channelId', $channelId);
        $request->bindValue(':userId', $userId);

        $request->execute();

        $request = $this->connect()->prepare("DELETE FROM Socket WHERE Id_Channels = :channelId AND Id_Users = :userId");

        $request->bindValue(':channelId', $channelId);
        $request->bindValue(':userId', $userId);

        $request->execute();

        return true;
    }

    public function getUsersIntoChannel($channel)
    {
        $request =$this->connect()->prepare("SELECT U.Last_name, U.First_name, U.Id FROM Users AS U
                                                       INNER JOIN Channel_users AS C ON C.Id_Users = U.Id WHERE C.Id = :channelId");
        $request->bindValue(':channelId', $channel);
        $request->execute();

        return $request->fetchAll();
    }

}