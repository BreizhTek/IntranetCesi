<?php
class ModelCar {
    private function connect() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=intranet_cesi','root','');
        } catch(PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
        return $db;
    }

    public function getCarById($id){
        $sql = "SELECT 
                    cars.*,
                    users.Last_name,
                    users.First_name
                    FROM cars
                    INNER JOIN users on users.Id = cars.Id_Users
                    WHERE cars.Id =  :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement;
    }

    public function getCarByUser($id){
        $sql = "SELECT 
                    cars.*
                    FROM cars
                    INNER JOIN users on users.Id = cars.Id_Users
                    WHERE cars.Id_Users =  :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement;
    }

    public function updateCar($data)
    {
        $sql = "UPDATE cars
                    SET
                        cars.Plate = :Plate,
                        cars.Brand = :Brand,
                        cars.Color = :Color,
                        cars.Model = :Model
                           WHERE cars.Id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":id", $data['Id']);
        $statement->bindValue(":Plate", $data['Plate'],PDO::PARAM_INT);
        $statement->bindValue(":Brand", $data['Brand'],PDO::PARAM_STR);
        $statement->bindValue(":Color", $data['Color'],PDO::PARAM_STR);
        $statement->bindValue(":Model", $data['Model'],PDO::PARAM_STR);
        $statement->execute();
        return $statement;
    }

    public function insertCar($data)
    {
        $sql = "INSERT INTO cars
                    (
                        Plate,
                        Brand,
                        Color,
                        Model,
                        Id_Users
                    )
                    VALUES
                    (
                        :Plate,
                        :Brand,
                        :Color,
                        :Model,
                        :NameUser
                    )";

        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(":Plate", $data['Plate'],PDO::PARAM_STR);
        $statement->bindValue(":Brand", $data['Brand'],PDO::PARAM_STR);
        $statement->bindValue(":Color", $data['Color'],PDO::PARAM_STR);
        $statement->bindValue(":Model", $data['Model'],PDO::PARAM_STR);
        $statement->bindValue(":NameUser", $data['NameUser'],PDO::PARAM_INT);
        $statement->execute();
        return $statement;
    }
}