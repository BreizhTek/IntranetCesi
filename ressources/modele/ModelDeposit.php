<?php

class ModelDeposit
{

    private function connect() //PDO Connexion
    {
        try {
            $db = new PDO(DSN, USER, PASS);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }

        return $db;
    }


    // Insert file into DB
    public function insertFile($p_name, $p_size, $p_type)
    {
        try {
            $author =  $_SESSION['First_name'] . '  ' . $_SESSION['Last_name'];

            $request = $this->connect()->prepare("INSERT INTO Deposit (Name, Size, Type, Author) VALUES (:name, :size, :type, :author)"); // Prepare statement
            $request->bindValue(':name',  $p_name);
            $request->bindValue(':size',  $p_size);
            $request->bindValue(':type',  $p_type);
            $request->bindValue(':author',  $author);
            $request->execute();

            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }

    }

    // Get file characteristic
    public function displayFile()
    {
        try {
            $request = $this->connect()->prepare("SELECT Name, Size, Type, Author FROM Deposit" );
            $request->execute();
            return $request->fetchAll();
        }
        catch(PDOException $e)
        {
            return false;
        }

    }

    // Delete file in the DB
    public function deleteFile()
    {
        try {
            $request = $this->connect()->prepare("DELETE FROM Deposit WHERE Name= :name  "); // Prepare statement
            $request->bindValue(':name',  $_POST['name']);
            $request->execute();

            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }

    }

}