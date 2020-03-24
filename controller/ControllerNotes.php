<?php
require_once "ressources/modele/ModelNotes.php";
require_once "ressources/modele/ModelUser.php";
require_once "ressources/modele/ModelClasses.php";
require_once "ressources/modele/ModelClass.php";

class ControllerNotes
{
    public function index(){
        $id = $_SESSION['User_ID'];
        $modelNotes = new Notes();
        $modelClass = new ModelClass();

        if ($_SESSION['Level'] == 1){
            $listeNotes = $modelNotes->findAllByUser($id);
            $listeAVG   = $modelNotes->getMoyenneByModuleAndUser($id);
        } else {

            $listeClass = $modelClass->findAll();
            $listeNotes = $modelNotes->findAll();
            $listeAVG   = $modelNotes->getMoyenneAll();

            $listeNotes = $modelNotes->findAll();
        }

        //$row = $listeNotes->
        //$listeMoyenne = $modelNotes->getMoyenneByModuleAndUser($id);

        require_once __DIR__ . "/../view/Notes/indexNotes.php";

    }


    public function addAction(){
        if(!empty($_POST)){
            $this->_editNotes();
        } else {
            $request = $_SERVER['REQUEST_URI'];
            $req = explode("/", $request);
            $modelUser = new ModelUser();
            $listeUser = $modelUser->getUsersByClass($req["2"]);


            $modelClass = new ModelClass();
            $listeClass = $modelClass->findAll();

            $modelClasses = new ModelClasses();
            $listeClasses = $modelClasses->findAllByIdClass($req["2"]);

            require_once __DIR__ . "/../view/Notes/noteAdd.php";
        }
    }

    public function editAction($idNotes){
        if(!empty($_POST)){
            $this->_editNotes();
        } else {
            require_once __DIR__ . "/../view/Notes/noteEdit.php";
        }
    }


    private function _editNotes(){
        $data = array(
            'Id_Users' => $_POST['idUser'],
            'Id_Classes' => $_POST['idClasses'],
            'Id_Notes' => $_POST['notes'],

        );
        $modelNotesr = new ModelNotes();
        $userUpdate = $modelNotesr->save($data);
    }



}