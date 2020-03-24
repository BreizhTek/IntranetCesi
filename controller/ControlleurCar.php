<?php
class ControllerCar {

    public function index(){
        require_once 'ressources/modele/ModelCar.php';
        require_once 'ressources/modele/ModelUser.php';
        require './ressources/composants/templatePage.php';
        $modelUser = new ModelUser();
        $users = $modelUser->getUserAll();
        $allUsers = $users->fetchAll(PDO::FETCH_ASSOC);

        $request = $_SERVER['REQUEST_URI'];
        $req = explode("/", $request);
        $modelCar = new ModelCar();
        $carUser = ((isset($req["2"])) ? $modelCar->getCarById($req["2"]) : NULL);
        $row = (($carUser <> NULL) ? $carUser->fetch(PDO::FETCH_ASSOC) : "");
        require_once ('view/car.php');
    }

    public function update(){
        require_once 'ressources/modele/ModelCar.php';
        $data = array(
            'Id' => $_POST['Id'],
            'Plate' => $_POST['Plate'],
            'Brand' => $_POST['Brand'],
            'Color' => $_POST['Color'],
            'Model' => $_POST['Model'],
        );

        $modelCar = new ModelCar();
        $carUpdate = $modelCar->updateCar($data);
    }

    public function insert(){
        require_once 'ressources/modele/ModelCar.php';
        $data = array(
            'Id' => $_POST['Id'],
            'Plate' => $_POST['Plate'],
            'Brand' => $_POST['Brand'],
            'Color' => $_POST['Color'],
            'Model' => $_POST['Model'],
            'NameUser' => $_POST['NameUser'],
        );

        $modelCar = new ModelCar();
        $carInsert = $modelCar->insertCar($data);
    }
}
?>