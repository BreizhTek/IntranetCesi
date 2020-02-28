<?php

//require '/path/to/FlashMessages.php';
require_once "ressources/modele/ModelLogin.php";


class ControllerLogin {

    public function index(){

        require "./view/login.php";

    }

    /**
     * Function which chek email and password
     */
    public function authentification(){
        $mail      = $_POST['email'];
        $password  = $_POST['password'];

        $checkPass = $this->checkPassword($mail, $password);

        //check if email and password are corrects
        if ($checkPass){
            require_once 'ressources/modele/ModelLogin.php';
            $modelLogin = new ModelLogin();
            $user_check = $modelLogin->getUserByEmail($mail);


            while($row = $user_check->fetch()) {
                // redirect to layout with her Identifiant and Level and check if an user's birthday
                //Create SESSION

                $liste = array($row['Id'], $row['Level']);
                $_SESSION[$row['Last_name']." ".$row['First_name']]= $liste;
                //echo print_r($_SESSION[$row['Last_name']." ".$row['First_name']],TRUE);
            }
        } else {
            // redirect to login and send a message said "incorrect login or password, please enter a correct login and password"
            echo "Erreur : mot de passe ou login incorrect!!";
        }
    }

    
    protected function checkPassword($email, $password){

        require_once 'ressources/modele/ModelLogin.php';
        $modelLogin = new ModelLogin();

        $result = $modelLogin->getUserByEmail($email);

        // $result = ModelLogin::getUserByEmail($email);
        while($row = $result->fetch()){
            if (password_verify($password ,$row['Password'])) {
                return true;
            } else {
                return false;
            }
        }
    }


    

}