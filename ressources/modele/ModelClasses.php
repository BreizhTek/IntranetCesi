<?php


class ModelClasses
{
    private function connect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=intranet_cesi','root','');
        }
        catch(PDOException $e)
        {
            error_log($e->getMessage());
            return false;
        }

        return $db;
    }

    public function findAll(){

        $request = $this->connect()->prepare("SELECT c.Id, c.Name, c.Matter, c.`Begin`, c.`End`, c.Id_Users FROM classes c; ");

        $request->execute();

        return $request->fetchAll();

    }


    public function findAllByIdClass($idClass){

        $request = $this->connect()->prepare("SELECT c.Id, c.Name, c.Matter, c.`Begin`, c.`End`, c.Id_Users FROM classes c 
                                                    INNER JOIN timetable t ON t.Id_Classes = c.Id
                                                    INNER JOIN class c2 ON c2.Id = t.Id_Class
                                                    WHERE c2.Id = ;");
        $request->bindValue(':classid', $idClass);
        $request->execute();

        return $request->fetchAll();

    }

    public function findByName($name){

        $request = $this->connect()->prepare("SELECT c.Id, c.Name, c.Matter, c.`Begin`, c.`End`, c.Id_Users FROM classes c;");
        $request->bindValue('c.Name', $name);
        $request->execute();

        return $request->fetchAll();

    }
}