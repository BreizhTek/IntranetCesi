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

        $request = $this->connect()->prepare("SELECT * FROM Channels");

        $request->execute();

        return $request->fetchAll();

    }

}