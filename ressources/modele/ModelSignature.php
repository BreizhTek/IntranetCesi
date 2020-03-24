<?php

class ModelSignature
{

    private function connect() //PDO Connexion
    {
        try
        {
            $db = new PDO('mysql:host=localhost;port=3308;dbname=intranet', 'root', '');
        }
        catch(PDOException $e)
        {
            error_log($e->getMessage());
            return false;
        }

        return $db;
    }


    public function sign() {

        try {

            $request = $this->connect()->prepare("UPDATE users SET sign=1 WHERE Id= :id"); // Prepare statement
            $request->bindValue(':id',  $_SESSION['User_ID']);
            $request->execute(); // Request to confirm the student signature in the DB

            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }

    public function getPresence() {

        try {
//            $request = $this->connect()->prepare("SELECT u.First_name, u.Last_name, u.Id_class, u.sign, c.Name, c.Year_begin FROM users AS u
//                                                        INNER JOIN class AS c ON c.class = u.Id_class
//                                                        WHERE u.Level = 1
//                                                        ORDER BY c.Name and c.Year_begin");
//                                                        INNER JOIN class AS c ON c.Id = u.Id_class
            $request = $this->connect()->prepare("SELECT u.Id, u.First_name, u.Last_name, u.sign, c.Name FROM users AS u
//                                                          INNER JOIN class AS c ON u.Id_Class = c.Id                                                           
                                                            WHERE u.Level = 1 ");

            $request->execute();

            return $request->fetchAll();
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
}