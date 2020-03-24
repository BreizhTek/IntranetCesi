<?php


class Chat {

    private function connect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=Intranet','root','');
        }
        catch(PDOException $e)
        {
            error_log($e->getMessage());
            return false;
        }

        return $db;
    }

    public function getChannels($userId)
    {

        $request = $this->connect()->prepare("SELECT CHA.Id, CHA.Name FROM Channels AS CHA
                                                        INNER JOIN Users AS U
                                                        INNER JOIN Channel_users AS CHAU ON CHAU.Id_Users = U.Id AND CHAU.Id = CHA.Id
                                                        WHERE U.Id = :userid;");

        $request->bindValue(':userid', $userId);
        $request->execute();

        return $request->fetchAll();

    }

    public function getMessages($channelId, $userId)
    {

        if (!$this->channelExist($this->getChannelName($channelId)))
            return false;


        if (!$this->grantedToShowThisChannel($channelId, $userId))
            return false;


        $request = $this->connect()->prepare("SELECT U.Id, U.First_name, M.Content, M.Date FROM Discussion AS D
                                                        INNER JOIN Users AS U ON U.Id = D.Id
                                                        INNER JOIN Messages AS M ON M.Id = D.Id_Messages
                                                        WHERE Id_Channels = :channelId;");

        $request->bindValue(':channelId', $channelId);

        $request->execute();

        return $request->fetchAll();

    }

    public function grantedToShowThisChannel($channelId, $userId)
    {

        $request = $this->connect()->prepare("SELECT * FROM Channel_users WHERE Id = :channelId AND Id_Users = :userid");

        $request->bindValue('channelId', $channelId);

        $request->bindValue('userid', $userId);

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