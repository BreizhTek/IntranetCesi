<?php

require_once "ressources/modele/ModelChat.php";

class ControllerChat {

    public function index(){

        $chat = new Chat();

        require "./view/Chat/Default.php";

    }

}