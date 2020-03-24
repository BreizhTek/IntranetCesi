<?php

require_once './db.php';
class ModelLayout
{

    /**
     * function which check birthday all users and insert into array $return
     * @return array
     */
    public function happyBirthDay(){
        $db  = database();
        $sql = "SELECT Id, First_name, Last_name, Picture, YEAR(NOW()) - YEAR(Birth) as age 
                FROM Users 
                WHERE (DAY(Birth) = DAY(NOW()) ) and (MONTH(Birth) = MONTH(NOW()) );";
        $request = $db->prepare($sql);
        $request->execute();

        return $request->fetchAll();
    }
}