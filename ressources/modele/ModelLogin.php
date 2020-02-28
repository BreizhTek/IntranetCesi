<?php
require_once './db.php';

class ModelLogin
{
    private function connect()
    {
        try
        {
            $db = new PDO(DSN,USER,PASS);
        }
        catch(PDOException $e)
        {
            error_log($e->getMessage());
            return false;
        }

        return $db;
    }

    public function getLogin($mail, $password)
    {

        $request = $this->connect()->prepare("SELECT * FROM users WHERE Mail =".$mail." AND Password =".$password.";");

        $request->execute();


        return $request;

    }


    public function getUserByEmail($email){
        $db = database();
        $sql ="SELECT * FROM users WHERE users.Mail = :email;";

        $request = $db->prepare($sql);

        $request->bindValue(":email", $email);

        $request->execute();
        return $request;
    }




    /**
     * function which check birthday all users and insert into array $return
     * @return array
     */

    public function happyBirthDay(){
        $sql = "SELECT id, nom, prenom, YEAR(NOW()) - YEAR(Birth) as age FROM user WHERE (DAY(Birth) = DAY(NOW()) ) and (MONTH(Birth) = MONTH(NOW()) );";
        $request = $db->prepare($sql);
        $request->execute();

        $return = array();
        foreach ($request as $row){
            $return[$row->getId()] = $row;
        }
        return $return;
    }
}
