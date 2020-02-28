<?php
class ControllerUser {

    public function index(){
        require_once 'ressources/modele/ModelUser.php';
        $request = $_SERVER['REQUEST_URI'];
        $req = explode("/", $request);
        $modelUser = new ModelUser();
        $userById = ((isset($req["2"])) ? $modelUser->getUserById($req["2"]) : NULL);
        $row = (($userById <> NULL) ? $userById->fetch(PDO::FETCH_ASSOC) : "");

        require_once ('view/user.php');
    }

    public function update(){
        $data = array(
            'Level' => $_POST['Level'],
            'LastName' => $_POST['LastName'],
            'FristName' => $_POST['FristName'],
            'Brith' => $_POST['Brith'],
            'Phone' => $_POST['Phone'],
            'MAil' => $_POST['MAil'],
            'Adress' => $_POST['Adress'],
            'NameTutor' => $_POST['NameTutor'],
            'MailTutor' => $_POST['MailTutor'],
            'Class' => $_POST['Class'],
        );
    }

    public function insert(){
        $data = array(
            'Level' => $_POST['Level'],
            'LastName' => $_POST['LastName'],
            'FristName' => $_POST['FristName'],
            'Brith' => $_POST['Brith'],
            'Phone' => $_POST['Phone'],
            'MAil' => $_POST['MAil'],
            'Adress' => $_POST['Adress'],
            'NameTutor' => $_POST['NameTutor'],
            'MailTutor' => $_POST['MailTutor'],
            'Class' => $_POST['Class'],
        );
    }
}
?>