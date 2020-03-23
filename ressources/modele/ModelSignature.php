<?php


class ModelSignature
{
    public function connect() {

    }

    public function sign() {
        require './db.php';
        $sth = $db->prepare("UPDATE users SET sign = :sign WHERE  id = :id");
        $sth->bindParam(':true', $_SESSION['User_ID']);
        $sth->execute();
    }
}