<?php
class ControllerCar {

    public function index(){
        require_once 'ressources/modele/ModelCar.php';
        require './ressources/composants/templatePage.php';
        $request = $_SERVER['REQUEST_URI'];
        $req = explode("/", $request);
        $modelCar = new ModelCar();
        $carUser = ((isset($req["2"])) ? $modelCar->getCarByUser($req["2"]) : NULL);
        $row = $carUser->fetchAll(PDO::FETCH_ASSOC);
        require_once ('view/car.php');
    }
}
?>