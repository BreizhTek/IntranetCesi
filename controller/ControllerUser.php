<?php
class ControllerUser {

    public function index(){
        require_once 'ressources/modele/User.php';
        $modelUser = new User();
        $dernierUser = $modelUser->getLastUser();
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
}
?>