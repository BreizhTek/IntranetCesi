<?php

require '/path/to/FlashMessages.php';

class LoginControll {

    /**
     * Function which chek email and password
     */
    public function authentification(){
        $checkPass = false;
        $msg       = new \Plasticbrain\FlashMessages\FlashMessages();
        $mail      = $_POST['email'];
        $password  = $_POST['password'];

        $checkPass->checkPassword($mail, $password);

        //check if email and password are corrects
        if ($checkPass){
            /*
             * Create a function which can to check an user and her status
             */
            $user_check = new ModelUser();

            //Check if user's level exist
            if (!empty($user_check->getLevel()->getLibelle())){
                // redirect to layout with her libelle and check if an user's birthday
            } else {
                // redirect to login and send a message which said "You don't have the authorization"

                $msg->error('You do not have the authorization!');
            }

        } else {
            // redirect to login and send a message said "incorrect login or password, please enter a correct login and password"

            $msg->error('Incorrect login or password, please enter a correct login and password!');

        }
    }

    /**
     * function which check birthday all users and insert into array $return
     * @return array
     */
    public function happyBirthDay(){
        //$sql = "SELECT id, nom, prenom, YEAR(NOW()) - YEAR(Birth) as age FROM user WHERE (DAY(Birth) = DAY(NOW()) ) and (MONTH(Birth) = MONTH(NOW()) );";

        $return = array();
        foreach ($result as $row){
            $return[$row->getId()] = $row;
        }
        return $return;
    }


    protected function checkPassword($email, $password){

        $hashPassword = "";
        $check = false;
        $sql = "SELECT * FROM user where Mail = '".$email."';";

        if (!empty($result)){
            $hashPassword->password_hash($password, PASSWORD_ARGON2I);
            if(password_verify($result->getPassword(), $hashPassword)){
                return $check = true;
            } else {
                return $check;
            }
        } else {
            return $check;
        }
    }

}