<?php
require_once "./db.php";
class ModelUser
{
   public function getUserAll(){
        $db = database();
        $sql = "SELECT * 
                    FROM users";
        $statement = $db->prepare($sql);
        $statement->execute();
        return $statement;
    }

    public function getUserById($id){
        $db = database();
        $sql = "SELECT * 
                    FROM users
                    WHERE users.Id = :id";
        $statement = $db->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement;
    }

    public function getLastUser()
    {
        // On simule une communication BDD
        $return = new stdClass();
        $return->nom = 'Titi';
        $return->prenom = 'Toto';
        return $return;
    }
}