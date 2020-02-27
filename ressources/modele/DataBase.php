<?php

define('DSN', 'mysql:host=localhost;dbname=Intranet');
define('USER', 'admin');
define('PASS', 'admin');


class dataBase {

    public function connect()
    {
        try
        {
            $bd = new PDO(DSN,USER,PASS);
        }
        catch(PDOException $e)
        {
            echo 'Erreur : ' . $e->getMessage();

            return false;
        }

        return $bd;

    }

}