<?php

define('DSN', 'mysql:host=localhost;dbname=Intranet');
define('USER', 'admin');
define('PASS', 'admin');

function database() {

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