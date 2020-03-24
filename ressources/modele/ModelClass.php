<?php


class ModelClass
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

        $request = $this->connect()->prepare("SELECT c.Id, c.Name, year(c.Year_begin) AS Y_begin, year(c.Year_end) AS Y_end, c.etablishment FROM class c;");

        $request->execute();

        return $request->fetchAll();

    }


    public function find($idClass){

        $request = $this->connect()->prepare("SELECT c.Id, c.Name, year(c.Year_begin) AS Y_begin, year(c.Year_end) AS Y_end, c.etablishment FROM class c WHERE c.Id = :idClass;");
        $request->bindValue(':idClass', $idClass);
        $request->execute();

        return $request->fetchAll();

    }

}