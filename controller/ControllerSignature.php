<?php
    require_once "ressources/modele/ModelSignature.php";

class ControllerSignature
{
    private $signature;

    public function __construct()
    {
        $this->signature = new ModelSignature(); // Create instance
    }

    public function index() {
        require './view/signature.html'; // Display button and modal to sign
    }

    public function sign() {

        return json_encode($this->signature->sign());  // Update the student presence into DB
    }

    public function send() {

        return json_encode($this->signature->getPresence()); // Get the presence list

    }
}

?>