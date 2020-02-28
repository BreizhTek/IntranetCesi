<?php


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


    public function getUserByEmail($email){
        $db = database();
        $sql ="SELECT * FROM users WHERE Users.Mail = :email;";

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
        $db  = database();
        $sql = "SELECT Id, First_name, Last_name, YEAR(NOW()) - YEAR(Birth) as age 
                FROM Users 
                WHERE (DAY(Birth) = DAY(NOW()) ) and (MONTH(Birth) = MONTH(NOW()) );";
        $request = $db->prepare($sql);
        $request->execute();

        return $request->fetchAll();
    }
}
