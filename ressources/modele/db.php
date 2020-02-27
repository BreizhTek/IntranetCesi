<?php

define('DSN', 'mysql:host=databases.000webhost.com;dbname=id12726210_intranetcesi');
define('USER', 'id12726210_breizhtek');
define('PASS', 'cesilemans');

try
{
    $bd = new PDO(DSN,USER,PASS);
}
catch(PDOException $e)
{
    echo 'Erreur : ' . $e->getMessage();
}
