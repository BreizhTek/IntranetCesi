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

                $_SESSION['User_ID'] = $row['Id'];

                $_SESSION['Level'] = $row['Level'];

                $_SESSION['Last_name'] = $row['Last_name'];

                $_SESSION['First_name'] = $row['First_name'];

            }

            header('Location: /layout');
            exit();

        } else {
            header('Location: /login');
            exit();
        }
    }

    
    protected function checkPassword($email, $password){

        require_once 'ressources/modele/ModelLogin.php';
        $modelLogin = new ModelLogin();

        $result = $modelLogin->getUserByEmail($email);

        // $result = ModelLogin::getUserByEmail($email);

        $dbPassword = $result->fetch()['Password'];

            if (password_verify($password ,$dbPassword)) {

                return true;

            } else {

                return false;

            }

    }


    

}