<?php
class ControllerAllUser {

    public function index(){
        require_once 'ressources/modele/ModelUser.php';
        require './ressources/composants/templatePage.php';
        $modelUser = new ModelUser();
        $userAll = $modelUser->getUserAll();
        $row = $userAll->fetchAll(PDO::FETCH_ASSOC);
        require_once ('view/allUsers.php');
    }
}
?>