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
        require_once 'ressources/modele/ModelUser.php';
       // echo"<pre>"; var_dump($_POST);die();
        $data = array(
            'Id' => $_POST['Id'],
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

        $modelUser = new ModelUser();
        $userUpdate = $modelUser->updateUser($data);
    }

    public function insert(){
        require_once 'ressources/modele/ModelUser.php';
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
        $modelUser = new ModelUser();
        $userUpdate = $modelUser->insertUser($data);
    }
}
?>