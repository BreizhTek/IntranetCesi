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


    public function getUserByEmail($email){
        $db = database();
        $sql ="SELECT * FROM Users WHERE Mail = :email;";

        $request = $db->prepare($sql);

        $request->bindValue(":email", $email);

        $request->execute();
        return $request;
    }

}
