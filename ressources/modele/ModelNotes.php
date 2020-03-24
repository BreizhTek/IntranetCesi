<?php

class Notes
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



    public function findAll(){

        $request = $this->connect()->prepare("SELECT u.Id, u.Last_name, u.First_name, c.Name, c.Matter, n2.Note  FROM note n
                                                    INNER JOIN notes n2 ON n2.Id = n.Id_Notes
                                                    INNER JOIN classes c ON c.Id = n.Id_Classes
                                                    INNER JOIN users u ON u.Id = n.Id_Users;");

        $request->execute();

        return $request->fetchAll();

    }


    public function findAllByUser($idUser)
    {

        $request = $this->connect()->prepare("SELECT u.Last_name, u.First_name, c.Name, c.Matter, n2.Note  FROM note n
                                                    INNER JOIN notes n2 ON n2.Id = n.Id_Notes
                                                    INNER JOIN classes c ON c.Id = n.Id_Classes
                                                    INNER JOIN users u ON u.Id = n.Id_Users
                                                    WHERE n.Id = :userid;");

        $request->bindValue(':userid', $idUser);
        $request->execute();

        return $request->fetchAll();

    }

    public function getMoyenneAll(){
        $request = $this->connect()->prepare("SELECT u.Id, u.Last_name, u.First_name, c.Name, c.Matter, avg(n2.Note) AS Note  FROM note n
                                                    INNER JOIN notes n2 ON n2.Id = n.Id_Notes
                                                    INNER JOIN classes c ON c.Id = n.Id_Classes
                                                    INNER JOIN users u ON u.Id = n.Id_Users
                                                    GROUP BY concat(u.Id, c.Matter);");

        $request->execute();

        return $request->fetchAll();
    }


    public function getMoyenneByModuleAndUser($idUser){

    }

    protected function save($datas){

    }
}