<?php

define('DSN', 'mysql:host=localhost;dbname=intranet_cesi');
define('USER', 'root');
define('PASS', '');

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