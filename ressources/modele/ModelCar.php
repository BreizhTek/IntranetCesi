<?php
class ModelCar {
    private function connect() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=intranetcesi','root','');
        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        return $db;
    }

    public function getCarByUser($id){
        $sql = "SELECT * 
                    FROM cars
                    WHERE cars.Id_Users = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement;
    }
}