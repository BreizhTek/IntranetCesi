<?php

class socketAuthorization
{

    private function connect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=Intranet','admin','admin');
        }
        catch(PDOException $e)
        {
            error_log($e->getMessage());
            return false;
        }

        return $db;
    }

    public function addAuthorization($channel)
    {

        $token = hash("sha256", rand());
        $date = date("Y-m-d H:i:s");

        $request = $this->connect()->prepare("INSERT INTO Socket (Id_users, Token, Channel_Id, Expire) VALUES (:userid, :token, :channel, :expire)");

        $request->bindValue(':userid', $_SESSION['User_ID']);
        $request->bindValue(':channel', $channel);
        $request->bindValue(':token', $token);
        $request->bindValue(':expire', $date);


        $request->execute();

    }

    public function getAuth($channel)
    {

        $request = $this->connect()->prepare("SELECT Id_users, Channel_Id, Token FROM Socket WHERE Id_users = :userid AND Channel_Id = :channelid");

        $request->bindValue(':userid', $_SESSION['User_ID']);
        $request->bindValue(':channelid', $channel);

        $request->execute();

        return $request->fetchAll()[0];

    }

    public function isGranted($userId, $channelId, $token)
    {
        $request = $this->connect()->prepare("SELECT Expire, Token FROM Socket WHERE Id_users = :userid AND Channel_Id = :channelid");

        $request->bindValue(':userid', $userId);
        $request->bindValue(':channelid', $channelId);

        $request->execute();

        $delay = $request->fetch();

        if (!empty($delay))
        {
            $this->removeAuth($userId, $channelId);

            if(password_verify($delay['Token'], $token))
                return true;

            return false;
        }
        else
        {
            return false;
        }

    }

    private function removeAuth($user, $channel)
    {

        $request = $this->connect()->prepare("DELETE FROM Socket WHERE Id_users = :userid AND Channel_Id = :channelid");

        $request->bindValue(':userid', $user);
        $request->bindValue(':channelid', $channel);

        $request->execute();

    }

}