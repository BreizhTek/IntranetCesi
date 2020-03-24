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
        if ($_SESSION['Level'] == 1){
            $listeNotes = $modelNotes->findAllByUser($id);
        } else {
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
            $modelUser->getUsersByClass($req["2"]);

            $modelClass = new ModelClass();
            $modelClass->findAll();

            $modelClasses = new ModelClasses();
            $modelClasses->findAllByIdClass($req["2"]);

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
            'Level' => $_POST['Level'],
            'LastName' => $_POST['LastName'],
            'FristName' => $_POST['FristName'],
            'Post' => $_POST['Post'],
            'Brith' => $_POST['Brith'],
            'Phone' => $_POST['Phone'],
            'Mail' => $_POST['Mail'],
            'Adress' => $_POST['Adress'],
            'NameTutor' => $_POST['NameTutor'],
            'MailTutor' => $_POST['MailTutor'],
            'pwd' => $_POST['Password'],
        );
        $modelNotesr = new ModelNotes();
        $userUpdate = $modelNotesr->save($data);
    }



}