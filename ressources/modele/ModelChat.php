<?php

define('DSN', 'mysql:host=localhost;dbname=Intranet');
define('USER', 'admin');
define('PASS', 'admin');

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

    public function getMessages()
    {

        $request = $this->connect()->prepare("SELECT * FROM Messages");

        $request->execute();

        return $request->fetchAll();

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