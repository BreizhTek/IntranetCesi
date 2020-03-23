<?php


class ControllerSignature
{
    public function index() {
        require './view/signature.html';
    }

    public function sign() {

        require_once './db.php';
        $request = $dbh->prepare();
        $sth->execute();
    }
}

?>