<?php

class controllerDb
{

    public function connect()
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

}