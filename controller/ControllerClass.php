<?php
require_once "ressources/modele/ModelClass.php";
require_once "ressources/modele/ModelNotes.php";

class ControllerClass
{
    public function index(){
        $modelNotes = new Notes();
        $listeNotes = $modelNotes->findAll();
        $listeAVG   = $modelNotes->getMoyenneAll();
        //$id = $_SESSION['User_ID'];
        $modelClass = new ModelClass();
        $listeClass = $modelClass->findAll();


        //$row = $listeNotes->
        //$listeMoyenne = $modelNotes->getMoyenneByModuleAndUser($id);

        require_once __DIR__ . "/../view/Class/indexClass.php";

    }
}