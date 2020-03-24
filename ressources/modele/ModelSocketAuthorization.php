<?php

class socketAuthorization
{

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

    public function addAuthorization($channel)
    {

        $token = hash("sha256", rand());
        $date = date("Y-m-d H:i:s");

        $request = $this->connect()->prepare("INSERT INTO Socket (Id_Users, Token, Id_Channels, Expire) VALUES (:userid, :token, :channel, :expire)");

        $request->bindValue(':userid', $_SESSION['User_ID']);
        $request->bindValue(':channel', $channel);
        $request->bindValue(':token', $token);
        $request->bindValue(':expire', $date);


        return $request->execute();

    }

    public function getAuth($channel)
    {

        $request = $this->connect()->prepare("SELECT Id_Users, Id_Channels, Token FROM Socket WHERE Id_Users = :userid AND Id_Channels = :channelid");

        $request->bindValue(':userid', $_SESSION['User_ID']);
        $request->bindValue(':channelid', $channel);

        $request->execute();

        return $request->fetchAll()[0];

    }

    public function isGranted($userId, $channelId, $token)
    {
        $request = $this->connect()->prepare("SELECT Expire, Token FROM Socket WHERE Id_Users = :userid AND Id_Channels = :channelid");

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

        $request = $this->connect()->prepare("DELETE FROM Socket WHERE Id_Users = :userid AND Id_Channels = :channelid");

        $request->bindValue(':userid', $user);
        $request->bindValue(':channelid', $channel);

        $request->execute();

    }

    public function sendMessage($channelId, $message, $userId)
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

        $request->bindValue(':userId', $userId);

        $request->bindValue('channelId', $channelId);

        $request->bindValue('messageId', $messageId);

        $request->execute();
    }

}